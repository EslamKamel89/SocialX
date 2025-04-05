<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Livewire\Attributes\Reactive;

new
    class extends Component {
        // #[Reactive]
        public Post $post;
    }; ?>
<div class="flex space-x-2">
    <div><img class="w-10 h-10 rounded" src="{{ $post->user->avatarUrl() }}" /></div>
    <div class="w-full">
        <div class="flex items-center mb-2 space-x-2 ">
            <div class="px-2 py-1 border border-gray-300 rounded-full">{{ $post->id }}</div>
            <div>{{ $post->user->name }}</div>
        </div>
        <p class="text-xs font-semibold uppercase opacity-60 ">{{ $post->body }}</p>
    </div>
</div>