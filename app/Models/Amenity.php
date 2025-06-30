<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property mixed $name
 * @property mixed|string $slug
 * @method static create(array $array)
 * @method static where(string $string, true $true)
 */
class Amenity extends Model
{
    use HasSlug;

    protected $fillable = ['name','slug','icon_class','type','is_key_feature'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * The properties that have this amenity.
     */
    public function properties(): BelongsToMany
    {
        // একটি সুবিধার অনেকগুলো প্রপার্টি থাকতে পারে
        return $this->belongsToMany(Property::class)
            ->withPivot('details','is_key_feature')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
    }
}
