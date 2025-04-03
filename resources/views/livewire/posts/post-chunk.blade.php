<?php

use App\Helpers\pr;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Volt\Component;

new class extends Component {
    public ?int $chunk = null;
    // #[Reactive()]
    public $ids = [];

    public function with(): array {
        // pr::dump($this->chunk, 'chunk index');
        return [
            'posts' => Post::whereIn('id', $this->ids)
                ->with(['user'])
                ->latest()
                ->get()
        ];
    }
    #[On('post.{chunk}.prepend')]
    public function prependToChunk($postId) {
        $this->ids = [$postId, ...$this->ids ?? []];
    }
    #[On('post.{chunk}.deleted')]
    public function deletePost($postId) {
        $key = array_search($postId, $this->ids);
        unset($this->ids[$key]);
    }
}; ?>

<div>
    <ul class="shadow-md list bg-base-100 rounded-box">
        @foreach ($posts as $post )
        <livewire:posts.post-item :post="$post" :key="$post->id" />
        @endforeach
    </ul>
</div>