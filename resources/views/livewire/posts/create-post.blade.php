<?php

use Livewire\Volt\Component;
use App\Helpers\pr;
use Livewire\Attributes\Rule;

new class extends Component {
    #[Rule('required')]
    public string $body = '';
    public function submit() {
        $this->validate();
        dump($this->body);
    }
}; ?>

<div>
    <form class="flex flex-col w-full mb-4" wire:submit.prevent="submit">
        <livewire:common.textarea
            wire:model.live="body"
            label="Post"
            placeholder="What do you want to say"
            :error="$errors->get('body')" />
        <button type="submit" class="text-white  btn btn-sm btn-success">Post</button>
    </form>
</div>