<?php

use App\Events\PostDeletedEvent;
use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

new
    class extends Component {
        public Post $post;
        public function delete() {
            Gate::authorize('delete', $this->post);
            $postId = $this->post->id;
            $this->post->delete();
            $this->dispatch('post.deleted', $postId);
            broadcast(new PostDeletedEvent($postId))->toOthers();
        }
        public function edit() {
        }
    }; ?>

<div>
    <li class="flex items-center justify-between list-row" x-data="{showForm:false}" x-cloak>
        <div x-show="!showForm" class="shrink-0">
            <livewire:posts.components.post-info :post="$post" />
        </div>
        <div x-show="showForm" class="block w-full grow-1">
            <livewire:posts.components.post-form :post="$post" x-on:cancel="showForm=false" />
        </div>
        <div class="flex items-center self-stretch justify-end h-full w-fit">
            @can('update' , $post)
            <button class="btn btn-square btn-ghost" @click="showForm = !showForm">
                <x-icons.edit class="w-5 h-5 text-blue-900" x-show="!showForm" />
                <x-icons.cancel class="w-5 h-5 text-red-900" x-show="showForm" />
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
        </div>
    </li>

</div>