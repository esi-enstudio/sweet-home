<?php

namespace App\Livewire\News;

use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SidebarPopularTags extends Component
{
    #[Computed(seconds: 3600, cache: true)]
    public function popularTags()
    {
        // withCount('posts') ব্যবহার করে প্রতিটি ট্যাগের পোস্ট সংখ্যা গণনা করুন
        return Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->take(10)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.sidebar-popular-tags');
    }
}
