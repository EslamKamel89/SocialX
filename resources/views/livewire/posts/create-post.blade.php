<?php

use App\Events\PostCreatedEvent;
use Livewire\Volt\Component;
use App\Helpers\pr;
use Livewire\Attributes\Rule;

new class extends Component {
    #[Rule('required')]
    public string $body = '';
    public function submit() {
        $this->validate();
        $post =  request()->user()->posts()->create([
            'body' => $this->body,
        ]);
        $this->reset('body');
        $this->dispatch('post.created', $post->id);
        broadcast(new PostCreatedEvent($post->id))->toOthers();
    }
}; ?>

<div>
    <form class="flex flex-col w-full mb-4" wire:submit.prevent="submit">
        <livewire:common.textarea
            wire:model="body"
            label="Post"
            placeholder="What do you want to say"
            :error="$errors->get('body')[0] ?? null" />
        <button type="submit" class="text-white btn btn-sm btn-success">Post</button>
    </form>
</div>