<?php

namespace App\Livewire\News;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentList extends Component
{
    public Post $post;
    public int $perPage = 3; // প্রতিবার কতগুলো মূল কমেন্ট লোড হবে

    /**
     * 'commentPosted' ইভেন্টটি শুনবে এবং কম্পোনেন্ট রিফ্রেশ করবে।
     */
    #[On('commentPosted')]
    public function refreshComponent(): void
    {
        // computed property আনসেট করুন, যাতে এটি নতুন করে গণনা হয়
        unset($this->comments);
        unset($this->totalComments);
    }

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    /**
     * মূল কমেন্টগুলো (রিপ্লাই ছাড়া) পেজিনেশন সহ লোড করে।
     */
    #[Computed]
    public function comments(): LengthAwarePaginator
    {
        return $this->post->comments() // Post মডেলে থাকা comments() রিলেশন
        ->where('is_approved', true)
            ->with(['user', 'replies', 'reactions']) // নেস্টেড রিলেশন ইগার লোড
            ->latest()
            ->paginate($this->perPage);
    }

    /**
     * মোট কমেন্টের সংখ্যা গণনা করে।
     */
    #[Computed]
    public function totalComments(): int
    {
        // এখানে আমরা সব কমেন্ট (রিপ্লাই সহ) গণনা করতে পারি
        return $this->post->allComments()->count();
    }

    /**
     * "Load More" বাটনে ক্লিক করলে এই মেথডটি কল হবে।
     */
    public function loadMore(): void
    {
        $this->perPage += 3;
        unset($this->comments); // নতুন করে লোড করার জন্য আনসেট করুন
    }

    /**
     * একটি কমেন্টে রিঅ্যাকশন যোগ বা ডিলিট করে।
     */
    #[On('reactionToggled')]
    public function toggleReaction(int $commentId): void
    {
        // যদি এমন হয় যে শুধুমাত্র লগইন করা ইউজাররা কমেন্টে রিয়েকশন দিতে পারবে তাহলে এই কোডটি আনকমেন্ট করুন।
//        if (!Auth::check()) {
//            $this->redirect(route('filament.user.auth.login'));
//            return;
//        }

        $userId = Auth::id();
        $comment = Comment::find($commentId);

        if (!$comment) return;

        // চেক করুন ইউজার আগে রিঅ্যাক্ট করেছে কি না
        $existingReaction = $comment->reactions()->where('user_id', $userId)->first();

        if ($existingReaction) {
            // যদি করে থাকে, তাহলে ডিলিট করুন (আনলাইক)
            $existingReaction->delete();
        } else {
            // যদি না করে থাকে, তাহলে নতুন রিঅ্যাকশন যোগ করুন
            $comment->reactions()->create([
                'user_id' => $userId,
                'reaction_type' => 'love', // আপাতত শুধু 'love'
            ]);
        }

        // 컴োনেন্ট রিফ্রেশ করুন
        unset($this->comments);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.comment-list');
    }
}
