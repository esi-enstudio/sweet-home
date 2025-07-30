<?php

namespace App\Livewire\News;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class NewsDetailsPage extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        // পোস্টটি পাবলিশ করা না থাকলে 404 দেখাও
        if (!$post->is_published) {
            abort(404);
        }

        // প্রয়োজনীয় সব রিলেশনশিপ ইগার লোড করে নিই
        $this->post->load(['user', 'category', 'tags', 'comments.user']);
    }

    // আগের এবং পরের পোস্ট লোড করার জন্য
    #[Computed]
    public function previousPost(): ?Post
    {
        return Post::where('id', '<', $this->post->id)
            ->where('is_published', 1)
            ->orderBy('id', 'desc')
            ->first();
    }

    #[Computed]
    public function nextPost(): ?Post
    {
        return Post::where('id', '>', $this->post->id)
            ->where('is_published', true)
            ->orderBy('id', 'asc')
            ->first();
    }

    // সম্পর্কিত পোস্ট লোড করার জন্য
    #[Computed]
    public function relatedPosts(): Collection
    {
        return Post::where('post_category_id', $this->post->post_category_id)
            ->where('id', '!=', $this->post->id)
            ->where('is_published', true)
            ->with('user')
            ->latest()
            ->take(2)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.news-details-page')
        ->title($this->post->meta_title ?? $this->post->title .' - '. config('app.name'));
    }
}
