<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public Post $post;
}; ?>

<div>
    <li class="list-row">
        <div><img class="size-10 rounded-box" src="{{ $post->user->avatarUrl() }}" /></div>
        <div>
            <div class="flex items-center mb-2 space-x-2 ">
                <div class="px-2 py-1 border border-gray-300 rounded-full">{{ $post->id }}</div>
                <div>{{ $post->user->name }}</div>
            </div>
            <div class="text-xs font-semibold uppercase opacity-60">{{ $post->body }}</div>
        </div>

        <button class="btn btn-square btn-ghost">
            <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                </g>
            </svg>
        </button>
    </li>

</div>