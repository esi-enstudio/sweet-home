<?php

namespace App\Livewire\News;

use App\Models\PostCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SidebarPostCategories extends Component
{
    #[Computed(seconds: 8600, cache: true, key: 'post-categories')]
    public function categories()
    {
        return PostCategory::where('posts_count', '>', 0)
            ->orderByDesc('posts_count')
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.sidebar-post-categories');
    }
}
