<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(string[] $array)
 */
class Tenant extends Model
{
    use HasUniqueSlug;

    protected $fillable = ['name','slug'];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'name';
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_tenant');
    }
}
