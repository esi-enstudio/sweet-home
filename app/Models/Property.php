<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'address',
        'landmark',
        'environment',
        'latitude',
        'longitude',
        'area_type',
        'property_type',
        'tenant_type',
        'total_area',
        'bedrooms',
        'bathrooms',
        'dining_rooms',
        'living_rooms',
        'study_rooms',
        'store_rooms',
        'balconies',
        'floor_plan',
        'floor_number',
        'flooring',
        'walls',
        'windows',
        'condition',
        'facing',
        'available_from',
        'views_count',
        'is_urgent',
        'listing_type',
    ];

    protected $casts = [
        'floor_number' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function amenity(): HasOne
    {
        return $this->hasOne(Amenity::class);
    }

    public function rentAndAdditionalCost(): HasOne
    {
        return $this->hasOne(RentAndAdditionalCosts::class);
    }

    public function rentalTerms(): HasOne
    {
        return $this->hasOne(RentalTerms::class);
    }

    public function contactNumber(): HasOne
    {
        return $this->hasOne(ContactNumber::class);
    }

    public function media(): HasOne
    {
        return $this->hasOne(Media::class);
    }
}



