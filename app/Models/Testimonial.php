<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, true $true)
 */
class Testimonial extends Model
{
    protected $fillable = [
        'user_id','client_designation','feedback_text','is_published','order_column'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


