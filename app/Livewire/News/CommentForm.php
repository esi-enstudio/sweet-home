<?php

namespace App\Livewire\News;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CommentForm extends Component
{
    public Post $post;
    public ?int $parentCommentId = null;
    public ?string $replyToName = null;

    public string $comment = '';

    protected $listeners = ['setReplyTo'];

    public function setReplyTo(int $commentId, string $name): void
    {
        $this->parentCommentId = $commentId;
        $this->replyToName = $name;
        $this->comment = "@{$name}: ";

        // ব্রাউজারে একটি ইভেন্ট পাঠানো হচ্ছে
        $this->dispatch('focus-comment-form');
    }

    /**
     * রিপ্লাই মোড বাতিল করে এবং ফর্ম রিসেট করে।
     */
    public function cancelReply(): void
    {
        $this->reset('parentCommentId', 'replyToName', 'comment');
    }

    public function postComment(): void
    {
        $this->validate(['comment' => 'required|string']);

        $newComment = Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
            'parent_id' => $this->parentCommentId,
            'comment' => $this->comment,
        ]);

        $this->reset(['comment', 'parentCommentId', 'replyToName']);
        $this->dispatch('commentPosted', $newComment->id);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.news.comment-form');
    }
}
