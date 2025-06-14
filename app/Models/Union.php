<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Union extends Model
{
    protected $fillable = ['upazila_id','name','bn_name'];

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }
}
