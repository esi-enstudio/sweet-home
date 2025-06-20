<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SpaceOverview extends Model
{
    /**
     * The properties that belong to the Fact.
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_space_overview')
            ->withPivot('dimensions')
            ->withTimestamps();
    }
}
