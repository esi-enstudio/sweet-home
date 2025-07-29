<?php

namespace App\Livewire\Blog;

use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    // রিপ্লাই ফর্মের জন্য
    public bool $showReplyForm = false;
    public string $replyText = '';

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
    }

    public function toggleReplyForm(): void
    {
        $this->showReplyForm = !$this->showReplyForm;
    }

    public function postReply(): void
    {
        if (!auth()->check()) return;

        $this->validate(['replyText' => 'required|string']);

        $newReply = $this->comment->replies()->create([
            'post_id' => $this->comment->post_id,
            'user_id' => auth()->id(),
            'comment' => $this->replyText,
        ]);

        $this->reset(['replyText', 'showReplyForm']);
        // নতুন রিপ্লাইটি লোড করার জন্য ইভেন্ট পাঠান
        $this->dispatch('commentAdded');
    }

    public function addReaction(string $type): void
    {
        if (!auth()->check()) return;

        // আগে রিঅ্যাকশন থাকলে আপডেট, না থাকলে নতুন তৈরি
        $this->comment->reactions()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['type' => $type]
        );
    }

    #[On('commentAdded')]
    public function refreshReplies(): void
    {
        // কমেন্টকে নতুন করে লোড করুন যাতে নতুন রিপ্লাই দেখা যায়
        $this->comment->load('replies');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.blog.comment-item');
    }
}
