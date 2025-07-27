<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static withCount(string $string)
 */
class Tag extends Model
{
    use HasCustomSlug;

    protected $fillable = ['name','slug'];

    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * The posts that belong to the tag.
     * একটি ট্যাগের সাথে অনেকগুলো Post যুক্ত থাকতে পারে।
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
