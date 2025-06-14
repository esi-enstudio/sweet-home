<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Amenity extends Model
{
    use HasTags;

    protected $fillable = [
        'property_id',
        'nearby_facilities',
        'natural_environments',
        'gas_connection',
        'kitchen_type',
        'has_lift',
        'water_quality',
        'water_tank',
        'electricity_type',
        'backup_power',
        'has_cctv',
        'has_security_guard',
        'has_parking',
        'has_roof_access',
        'pets_allowed',
    ];

    protected $casts = [
        'nearby_facilities' => 'array',
        'natural_environments' => 'array',
        'water_quality' => 'array',
        'backup_power' => 'array',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
