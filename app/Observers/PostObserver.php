<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostCategory;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $post->category()->increment('posts_count');
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        if ($post->isDirty('post_category_id')) {
            // পুরোনো ক্যাটাগরি থেকে কমাও
            PostCategory::find($post->getOriginal('post_category_id'))?->decrement('posts_count');

            // নতুন ক্যাটাগরিতে বাড়াও
            $post->category()->increment('posts_count');
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $post->category()->decrement('posts_count');
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
