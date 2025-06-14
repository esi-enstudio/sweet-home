<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $fillable = [
        'property_id',
        'division_id',
        'district_id',
        'upazila_id',
        'union_id',
        'area_name',
        'landmark',
        'latitude',
        'longitude',
        'area_type',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
