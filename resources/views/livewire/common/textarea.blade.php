<?php

use function Livewire\Volt\{state};

state(['input'])->modelable();
state(['error'])->reactive();
state(['placeholder']);
?>

<div class="w-full">
    <textarea
        type="text"
        wire:model="input"
        placeholder="{{ $placeholder }}"
        class="w-full border rounded-lg "></textarea>
    @if($error)
    <p class="mx-4 text-xs text-red-500">{{ $error[0] }}</p>
    @endif
</div>