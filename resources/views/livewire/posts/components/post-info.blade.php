<?php

use Livewire\Volt\Component;
use App\Models\Post;

new
    class extends Component {
        public Post $post;
    }; ?>
<div class="list-row">
    <div><img class="size-10 rounded-box" src="{{ $post->user->avatarUrl() }}" /></div>
    <div>
        <div class="flex items-center mb-2 space-x-2 ">
            <div class="px-2 py-1 border border-gray-300 rounded-full">{{ $post->id }}</div>
            <div>{{ $post->user->name }}</div>
        </div>
        <div class="text-xs font-semibold uppercase opacity-60">{{ $post->body }}</div>
    </div>
</div>