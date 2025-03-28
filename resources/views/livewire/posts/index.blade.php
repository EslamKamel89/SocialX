<?php

use Livewire\Volt\Component;
use App\Models\Post;
use App\Helpers\pr;

new class extends Component {
    public int $limit = 10;

    public function incrementLimit() {
        $this->limit = $this->limit +  10;
    }

    public function with(): array {
        return [
            'posts' => Post::with(['user'])
                ->take($this->limit)
                ->latest()
                ->get(),
        ];
    }
}; ?>

<div>
    <div>
        <ul class="shadow-md list bg-base-100 rounded-box">

            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">All Posts</li>
            @foreach ($posts as $post )
            <livewire:posts.post-item :post="$post" :key="$post->id" />
            @endforeach
            <div x-data x-intersect="$wire.incrementLimit()" class="w-20 h-20"></div>
        </ul>
    </div>
</div>