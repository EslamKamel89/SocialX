<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public Post $post;
    public function delete() {
    }
    public function edit() {
    }
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

        @can('update' , $post)
        <button class="btn btn-square btn-ghost" wire:click="edit">
            <x-icons.edit class="w-5 h-5 text-blue-900" />
        </button>
        @endcan
        @can('delete' , $post)
        <button class="btn btn-square btn-ghost" wire:confirm="Are you sure you want to delete this post?" wire:click="delete">
            <x-icons.trash class="w-5 h-5 text-red-900" />
        </button>
        @endcan
        <button class="btn btn-square btn-ghost">
            <x-icons.heart />
        </button>
    </li>

</div>