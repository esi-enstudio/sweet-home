<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'area_type',
        'landmark',
        'latitude',
        'longitude',
    ];

    protected function latitude(): Attribute
    {
        return Attribute::make(
            get: fn($value) => rtrim(rtrim($value, '0'), '.'),
            set: fn($value) => rtrim(rtrim($value, '0'), '.'),
        );
    }

    protected function longitude(): Attribute
    {
        return Attribute::make(
            get: fn($value) => rtrim(rtrim($value, '0'), '.'),
            set: fn($value) => rtrim(rtrim($value, '0'), '.'),
        );
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }

    public function union(): BelongsTo
    {
        return $this->belongsTo(Union::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
