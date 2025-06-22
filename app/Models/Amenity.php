<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $name
 * @property mixed|string $slug
 * @method static create(array $array)
 */
class Amenity extends Model
{
    use HasUniqueSlug;

    protected $fillable = ['name','slug','icon_class','type'];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * The properties that have this amenity.
     */
    public function properties(): BelongsToMany
    {
        // একটি সুবিধার অনেকগুলো প্রপার্টি থাকতে পারে
        return $this->belongsToMany(Property::class)
            ->withPivot('details')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
    }
}
