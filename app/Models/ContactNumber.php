<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactNumber extends Model
{
    protected $fillable = ['property_id', 'alternate_number', 'whatsapp_number', 'imo_number',];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

