<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalTerms extends Model
{
    protected $fillable = [
        'property_id',
        'contract_duration',
        'contract_breach_terms',
        'tenant_eligibility',
        'identity_verification',
        'background_check',
        'payment_schedule',
        'payment_methods',
        'house_usage_rules',
        'maintenance_responsibility',
        'damage_liability',
    ];

    protected $casts = [
        'payment_methods' => 'array',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}


