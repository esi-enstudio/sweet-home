<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SidebarLatestBlogs extends Component
{
    public ?int $exclude = null; // বর্তমান পোস্টের আইডি বাদ দেওয়ার জন্য

    #[Computed]
    public function latestPosts(): Collection
    {
        return Post::query()
            ->where('is_published', true)
            ->when($this->exclude, fn($q) => $q->where('id', '!=', $this->exclude))
            ->latest()
            ->take(4)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.blog.sidebar-latest-blogs');
    }
}
