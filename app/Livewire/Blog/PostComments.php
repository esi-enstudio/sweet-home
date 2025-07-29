<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class PostComments extends Component
{
    public Post $post;
    public int $perPage = 5; // প্রথমে ৫টি কমেন্ট দেখাবে
    public int $totalComments;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->totalComments = $post->comments()->count();
    }

    public function loadMore(): void
    {
        $this->perPage += 5;
    }

    // যখন একটি নতুন কমেন্ট বা রিপ্লাই যোগ হবে, তখন মোট সংখ্যা আপডেট করুন
    #[On('commentAdded')]
    public function updateTotalComments(): void
    {
        $this->totalComments = $this->post->comments()->count();
    }

    #[Computed]
    public function comments(): Collection
    {
        return $this->post->comments()
            ->with('user', 'replies', 'reactions')
            ->latest()
            ->take($this->perPage)
            ->get();
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.blog.post-comments');
    }
}
