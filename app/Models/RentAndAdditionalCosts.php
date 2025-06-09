<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentAndAdditionalCosts extends Model
{
    protected  $fillable = [
        'property_id',
        'monthly_rent',
        'rent_includes',
        'rent_increase_possibility',
        'is_negotiable',
        'water_bill',
        'gas_bill',
        'electricity_bill',
        'service_charge',
        'lift_charge',
        'generator_charge',
        'parking_fee',
        'advance_rent_months',
        'advance_payment_terms',
    ];

    protected $casts = [
        'rent_includes' => 'array',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
