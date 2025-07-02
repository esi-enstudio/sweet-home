<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $name
 * @property mixed|string $slug
 * @method static create(array $array)
 * @method static where(string $string, true $true)
 * @method static find(mixed $amenityId)
 * @method static withCount(string $string)
 */
class Amenity extends Model
{
    use HasCustomSlug;

    protected $fillable = ['name','slug','icon_class','type','is_key_feature'];

    public function getSluggableField(): string
    {
        return 'name';
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
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

}
