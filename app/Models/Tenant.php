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

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_tenant');
    }
}
