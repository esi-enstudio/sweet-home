<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = ['post_id','user_id','parent_id','name','phone','email','comment','is_approved'];

    protected $casts = ['is_approved' => 'boolean'];

    /**
     * Get the post that the comment belongs to.
     * প্রতিটি কমেন্ট একটি নির্দিষ্ট Post-এর অন্তর্গত।
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the user that made the comment.
     * প্রতিটি কমেন্ট একজন User দ্বারা তৈরি হতে পারে (যদি লগইন করা থাকে)।
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the replies for the comment.
     * একটি কমেন্টের অনেকগুলো রিপ্লাই থাকতে পারে।
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }
}
