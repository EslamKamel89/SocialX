<?php

use App\Helpers\pr;
use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {

    public $ids = [];
    public function with(): array {
        return [
            'posts' => pr::log(Post::whereIn('id', $this->ids)
                ->with(['user'])
                ->latest()
                ->get())
        ];
    }
}; ?>

<div>
    <ul class="shadow-md list bg-base-100 rounded-box">
        @foreach ($posts as $post )
        <livewire:posts.post-item :post="$post" :key="$post->id" />
        @endforeach
    </ul>
</div>