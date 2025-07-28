<?php

namespace App\Livewire\Blog;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public Post $post;

    // টপ-লেভেল কমেন্ট ফর্মের জন্য
    public string $comment = '';
    public string $name = '';
    public string $email = '';
    public string $phone = '';

    // রিপ্লাই ফর্মের জন্য
    public ?int $replyingTo = null; // কোন কমেন্টের রিপ্লাই দেওয়া হচ্ছে তার আইডি
    public string $replyComment = '';
    public string $replyName = '';
    public string $replyEmail = '';
    public string $replyPhone = '';

    public function mount(Post $post): void
    {
        $this->post = $post;
        // যদি ইউজার লগইন করা থাকে, তাহলে ফর্ম অটোফিল করুন
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->phone = Auth::user()->phone;
            $this->replyName = Auth::user()->name;
            $this->replyEmail = Auth::user()->email;
            $this->replyPhone = Auth::user()->phone;
        }
    }

    // "Reply" বাটনে ক্লিক করলে এই মেথডটি কল হবে
    public function startReply(int $commentId): void
    {
        $this->replyingTo = $commentId;
        $this->reset(['replyComment']); // রিপ্লাই বক্স পরিষ্কার করুন
    }

    // রিপ্লাই বাতিল করার জন্য
    public function cancelReply(): void
    {
        $this->replyingTo = null;
    }

    // টপ-লেভেল কমেন্ট সাবমিট করার জন্য
    public function submitComment(): void
    {
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:11',
            'email' => 'nullable|email',
            'comment' => 'required|string',
        ]);

        $this->createComment(); // হেল্পার মেথড কল করুন
        $this->reset(['comment']);
        session()->flash('comment_success', 'Your comment has been submitted for approval.');
    }

    // রিপ্লাই সাবমিট করার জন্য
    public function submitReply(): void
    {
        $this->validate([
            'replyComment' => 'required|string',
            'replyName' => 'required|string',
            'replyEmail' => 'nullable|email',
            'replyPhone' => 'required|digits:11',
        ]);

        $this->createComment($this->replyingTo, $this->replyComment, $this->replyName, $this->replyEmail);
        $this->reset(['replyingTo', 'replyComment']);
        session()->flash('comment_success', 'Your reply has been submitted for approval.');
    }

    // কমেন্ট তৈরির জন্য একটি কেন্দ্রীভূত হেল্পার মেথড
    private function createComment(?int $parentId = null, ?string $comment = null, ?string $name = null, ?string $email = null): void
    {
        $isApproved = false;

        // চেক করুন ব্যবহারকারী লগইন করা আছে কি না এবং তার 'super-admin' রোল আছে কি না
        // নিশ্চিত করুন আপনার User মডেলে hasRole() মেথডটি আছে (Spatie Permission প্যাকেজ)
        if (Auth::check() && Auth::user()->hasRole('super_admin')) {
            $isApproved = true;
        }

        Comment::create([
            'post_id' => $this->post->id,
            'parent_id' => $parentId,
            'user_id' => Auth::id(),
            'comment' => $comment ?? $this->comment,
            'name' => $name ?? $this->name,
            'email' => $email ?? $this->email,
            'phone' => $phone ?? $this->phone,
            'is_approved' => $isApproved,
        ]);
    }

    public function render(): Factory|View|Application
    {
        $comments = $this->post->comments()
            ->with(['user', 'replies.user'])
            ->where('is_approved', true)
            ->paginate(5);

        return view('livewire.blog.comments', ['comments' => $comments]);
    }
}
