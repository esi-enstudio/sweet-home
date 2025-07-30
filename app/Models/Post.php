<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use App\Traits\TracksViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $is_published
 * @property mixed $published_at
 * @method static where(string $string, string $string1, mixed $id)
 * @method trackView(\Illuminate\Http\Request $request)
 */
class Post extends Model
{
    use HasCustomSlug, TracksViews;

    protected $fillable = ['user_id','post_category_id','title','slug','content','featured_image','excerpt','is_published','published_at','meta_title','meta_description','views_count'];

    public function getSluggableField(): string
    {
        return 'title';
    }

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // saving ইভেন্টটি create এবং update উভয় ক্ষেত্রেই চলে
        static::saving(function (Post $post) {
            // isDirty() চেক করে যে is_published ফিল্ডটি এই সেভ অপারেশনে পরিবর্তন হচ্ছে কি না
            if ($post->isDirty('is_published')) {

                // যদি is_published-কে true করা হয় এবং published_at আগে থেকেই সেট করা না থাকে
                if ($post->is_published && is_null($post->published_at)) {
                    // published_at কলামে বর্তমান সময় সেট করুন
                    $post->published_at = now();
                }
                // যদি is_published-কে false করা হয়
                // (আপনি চাইলে এটিকে null নাও করতে পারেন, যাতে পুরোনো পাবলিশের তারিখ মনে থাকে)
                // else {
                //     $post->published_at = null;
                // }
            }
        });
    }

    /**
     * Get the author of the post.
     * একটি পোস্ট একজন User (লেখক) দ্বারা তৈরি হয়।
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of the post.
     * একটি পোস্ট একটি PostCategory-র অন্তর্গত।
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    /**
     * The tags that belong to the post.
     * একটি পোস্টের অনেকগুলো Tag থাকতে পারে।
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    /**
     * Get the comments for the news post.
     * একটি পোস্টের অনেকগুলো Comment থাকতে পারে।
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        // এই রিলেশনটি শুধুমাত্র মূল কমেন্টগুলো (যাদের parent_id null) নিয়ে আসবে
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    // এই নতুন রিলেশনটি যোগ করুন, যা রিপ্লাইসহ সব কমেন্ট গণনা করতে সাহায্য করবে
    public function allComments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
