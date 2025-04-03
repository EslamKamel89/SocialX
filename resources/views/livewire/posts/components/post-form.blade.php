<?php

use Livewire\Volt\Component;
use App\Models\Post;

new
    class extends Component {
        public Post $post;
        public ?string $body = null;
        public function mount() {
            $this->body = $this->post->body;
        }
        public function submit() {
        }
    }; ?>
<div class="!w-full">
    <form class="flex flex-col w-full mb-4" wire:submit.prevent="submit">
        <livewire:common.textarea
            wire:model="body"
            label="Post"
            placeholder="What do you want to say"
            :error="$errors->get('body')[0] ?? null" />
        <div>
            <button type="submit" class="text-white btn btn-sm btn-success">Edit</button>
        </div>
    </form>
</div>