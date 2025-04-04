<?php

use App\Events\PostUpdatedEvent;
use Livewire\Volt\Component;
use App\Models\Post;
use Livewire\Attributes\Rule;

new
    class extends Component {
        public Post $post;
        #[Rule('required')]
        public ?string $body = null;
        public function mount() {
            $this->body = $this->post->body;
        }
        public function submit() {
            $this->validate();
            $this->post->update([
                'body' => $this->body,
            ]);
            $this->dispatch(event: "post.{$this->post->id}.updated");
            broadcast(new PostUpdatedEvent($this->post->id))->toOthers();
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
            <button type="submit" class="text-white btn btn-sm btn-success">Save</button>
        </div>
    </form>
</div>