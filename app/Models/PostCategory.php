<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
    use HasCustomSlug;

    protected $fillable = ['name','slug'];

    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * Get all of the posts for the PostCategory.
     * একটি ক্যাটাগরির অধীনে অনেকগুলো Post থাকতে পারে।
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}
