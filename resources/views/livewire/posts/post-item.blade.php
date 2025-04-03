<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

new
    class extends Component {
        public Post $post;
        public function delete() {
            Gate::authorize('delete', $this->post);
            $this->post->delete();
        }
        public function edit() {
        }
    }; ?>

<div>
    <li class="list-row">
        <livewire:posts.components.post-info :post="$post" />
        <div class="flex items-center justify-end w-full ">
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
        </div>
    </li>

</div>