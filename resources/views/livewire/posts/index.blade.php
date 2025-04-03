<?php

use Livewire\Volt\Component;
use App\Models\Post;
use App\Helpers\pr;
use Livewire\Attributes\On;

new class extends Component {

    public   $chunks = [];
    public int $page  = 1;
    public function mount() {
        $this->chunks = Post::latest()
            ->pluck('id')
            ->chunk(10)
            ->map(fn($e) => $e->values())->toArray();
    }
    public function incrementPage() {
        $this->page++;
    }
    public function hasMorePages() {
        return $this->page < count($this->chunks);
    }
    public function with(): array {
        return [];
    }
    #[On('post.created')]
    public function prependPost(int $postId) {
        if (empty($this->chunks)) {
            $this->chunks[] = [];
        }
        $this->chunks[0] = [$postId, ...$this->chunks[0]];
        $this->dispatch('post.0.prepend', $postId);
    }
    #[On('echo:posts,PostCreatedEvent')]
    public function prependPostFromBroadcast(array $payload) {
        $this->prependPost($payload['postId']);
    }
    #[On('echo:posts,PostDeletedEvent')]
    public function deletePostFromBroadcast(array $payload) {
        $this->deletePost($payload['postId']);
    }

    #[On('post.deleted')]
    public function deletePost(int $postId) {
        foreach ($this->chunks as $i => $chunk) {
            foreach ($chunk as $k => $id) {
                if ($postId == $id) {
                    unset($chunk[$k]);
                    return;
                }
            }
        }
    }
    // #[On('echo:posts,ExampleEvent')]
    // public function testEvent() {
    //     dd('Event recieved');
    // }
}; ?>

<div>
    <div>
        <livewire:posts.create-post />
        <ul class="shadow-md list bg-base-100 rounded-box">
            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">All Posts</li>
            @if (count($this->chunks) )
            @for ($chunk = 0 ; $chunk < $page; $chunk++)
                <li>
                <livewire:posts.post-chunk :ids="$this->chunks[$chunk]" :key="$chunk" :chunk="$chunk" />
                </li>
                @endfor
                @else
                <p class="w-full my-8 text-center text-gray-500">There are no posts in the database</p>
                @endif

                @if ($this->hasMorePages())
                <div class="w-20 h-20" x-data x-intersect="$wire.incrementPage()"></div>
                @else
                <div class="flex items-center justify-center w-full my-4 font-bold text-gray-400 ">No more posts found</div>
                @endif
        </ul>
    </div>
</div>