<?php

namespace App\Livewire\Blog;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentForm extends Component
{
    // প্যারেন্ট কম্পোনেন্ট থেকে এই মানগুলো আসবে
    public int $postId;
    public ?int $parentId = null; // রিপ্লাইয়ের জন্য, ডিফল্ট null

    // ফর্মের জন্য প্রোপার্টি
    public string $comment = '';

    // ভ্যালিডেশনের নিয়ম
    protected array $rules = [
        'comment' => 'required|string|min:2',
    ];

    public function mount(int $postId, ?int $parentId = null): void
    {
        $this->postId = $postId;
        $this->parentId = $parentId;
    }

    /**
     * কমেন্ট বা রিপ্লাই পোস্ট করে।
     */
    public function postComment(): void
    {
        // নিশ্চিত করুন যে ব্যবহারকারী লগইন করা আছে
        if (!Auth::check()) {
            // আপনি চাইলে এখানে একটি ইভেন্ট পাঠাতে পারেন যা লগইন মডাল দেখাবে
            // $this->dispatch('show-login-modal');
            return;
        }

        $this->validate();

        $newComment = Auth::user()->comments()->create([
            'post_id' => $this->postId,
            'parent_id' => $this->parentId, // নতুন কমেন্টের জন্য null, রিপ্লাইয়ের জন্য id থাকবে
            'comment' => $this->comment,
            'is_approved' => true, // ডিফল্ট অ্যাপ্রুভড
        ]);

        // ফর্ম রিসেট করুন
        $this->reset('comment');

        // প্যারেন্ট কম্পোনেন্টগুলোকে জানানোর জন্য ইভেন্ট পাঠান
        $this->dispatch('commentAdded');

        // যদি এটি একটি রিপ্লাই ফর্ম হয়, তাহলে সেটিকে বন্ধ করার জন্য ইভেন্ট পাঠান
        if ($this->parentId) {
            $this->dispatch('replyFormSubmitted');
        }

        session()->flash('comment_success', 'Your comment has been posted!');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.blog.comment-form');
    }
}
