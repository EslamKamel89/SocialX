<?php

use Livewire\Volt\Component;
use App\Models\Post;
use App\Helpers\pr;

new class extends Component {

    public   $chunks = [];
    public int $page  = 1;
    public function mount() {
        $this->chunks = Post::latest()
            ->pluck('id')
            ->chunk(10)
            ->map(fn($e) => $e->values());
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
}; ?>

<div>
    <div>
        <ul class="shadow-md list bg-base-100 rounded-box">
            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">All Posts</li>
            @for ($chunk = 0 ; $chunk < $page; $chunk++)
                <li>
                <livewire:posts.post-chunk :ids="$this->chunks[$chunk]" :key="$chunk" />
                </li>
                @endfor
                @if ($this->hasMorePages())
                <div class="w-20 h-20" x-data x-intersect="$wire.incrementPage()"></div>
                @else
                <div class="flex items-center justify-center w-full my-4 font-bold text-gray-400 ">No more posts found</div>
                @endif
        </ul>
    </div>
</div>