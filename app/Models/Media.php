<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'property_id',
        'media_type',
        'file_path',
        'caption',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

