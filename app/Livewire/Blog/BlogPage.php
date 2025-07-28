<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class BlogPage extends Component
{
    use WithPagination;

    #[Url(keep: true)]
    public string $search = '';

    // পেজিনেশন রিসেট করার জন্য
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->select(['id','featured_image','title','content','published_at'])
            ->with(['user:id,name', 'category:id,name'])
            ->where('is_published', true)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->latest('published_at')
            ->paginate(9);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.blog.blog-page');
    }

    public function title(): string
    {
        return 'News - ' . config('app.name');
    }
}
