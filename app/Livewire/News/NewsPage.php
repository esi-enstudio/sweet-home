<?php

namespace App\Livewire\News;

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
class NewsPage extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url(as: 'category', except: '')]
    public string $selectedCategory = ''; // ক্যাটাগরি slug ট্র্যাক করার জন্য

    #[Url(as: 'user', except: '')]
    public string $selectedUser = ''; // ইউজার slug ট্র্যাক করার জন্য

    // --- নতুন প্রোপার্টি: কুয়েরি সম্পাদনের সময় ধরে রাখার জন্য ---
    public float $queryTime = 0;

    public function updating($property): void
    {
        // যেকোনো ফিল্টার পরিবর্তনের সময় পেজিনেশন রিসেট করুন
        if (in_array($property, ['search', 'selectedCategory'])) {
            $this->resetPage();
        }
    }

    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        // কুয়েরি শুরু হওয়ার সময় রেকর্ড করুন
        $startTime = microtime(true);

        $posts = Post::query()
            ->select(['id','user_id','post_category_id','featured_image','title','slug','content','published_at'])
            ->with(['user:id,name,slug', 'category:id,name,slug'])
            ->where('is_published', true)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategory, function ($query) {
                // 'category' রিলেশনশিপের উপর ভিত্তি করে ফিল্টার করা হচ্ছে
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->selectedCategory);
                });
            })
            ->when($this->selectedUser, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('slug', $this->selectedUser);
                });
            })
            ->latest('published_at')
            ->paginate(9);

        // কুয়েরি শেষ হওয়ার সময় রেকর্ড করুন এবং পার্থক্য গণনা করুন
        $endTime = microtime(true);
        $this->queryTime = $endTime - $startTime;

        return $posts;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.news-page')->title('News - ' . config('app.name'));
    }
}
