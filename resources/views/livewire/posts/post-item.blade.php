<?php

use App\Events\PostDeletedEvent;
use App\Events\PostLikedEvent;
use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;

new
    class extends Component {
        public Post $post;
        public bool $isLiked = true;
        protected $listeners = [];

        public function delete() {
            Gate::authorize('delete', $this->post);
            $postId = $this->post->id;
            $this->post->delete();

            $this->dispatch('post.deleted', $postId);
            broadcast(new PostDeletedEvent($postId))->toOthers();
        }
        #[On(("post.{post.id}.updated"))]
        public function edit() {
            $this->dispatch('post-item-hide-form');
            // $this->post->refresh();
        }
        public function getListeners() {
            return [
                "echo:posts.{$this->post->id},PostUpdatedEvent" => '$refresh',
                "echo:posts.{$this->post->id},PostLikedEvent" => '$refresh'
            ];
        }
        public function incrementLike() {
            $this->post->increment('likes');
            broadcast(new PostLikedEvent($this->post->id))
                ->toOthers();
        }
    }; ?>

<div>
    <li class="flex items-center justify-between list-row" x-data="{showForm:false}" x-cloak x-on:post-item-hide-form.window="showForm=false">
        <div x-show="!showForm" class="">
            <livewire:posts.components.post-info :post="$post" :key="$post->body" />
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
            <button class="relative btn btn-square btn-ghost" wire:click="incrementLike">

                <x-icons.heart class="{{ $isLiked ? 'text-red-500' : 'text-gray-400' }}" />
                @if($post->likes)
                <div class="absolute px-2 py-1 text-xs text-white border rounded-full -top-2 -right-4 bg-slate-700">{{ $post->likes }}</div>
                @endif
            </button>
        </div>
    </li>

</div>