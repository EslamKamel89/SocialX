<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public function with(): array {
        return [
            'posts' => Post::with(['user'])->latest()->get(),
        ];
    }
}; ?>

<div>
    <div>
        <ul class="shadow-md list bg-base-100 rounded-box">

            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">All Posts</li>
            @foreach ($posts as $post )

            <livewire:posts.post-item :post="$post" />
            @endforeach


        </ul>
    </div>
</div>
