<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static find(mixed $originalCategoryId)
 */
class PropertyType extends Model
{
    use HasUniqueSlug;

    protected $fillable = ['name', 'slug', 'properties_count'];

    /**
     * Get all the properties for the PropertyType.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
