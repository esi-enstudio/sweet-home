<?php

namespace App\Models;

use App\Traits\HasCustomSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SpaceOverview extends Model
{
    use HasCustomSlug;

    protected $fillable = ['name','slug','icon_class'];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * The properties that belong to the Fact.
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_space_overview')
            ->withPivot('length', 'width', 'total_sq_feet')
            ->withTimestamps();
    }
}
