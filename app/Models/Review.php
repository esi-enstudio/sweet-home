<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class Review extends Model
{
    protected $fillable = ['property_id','user_id','rating','comment'];

    /**
     * এই রিভিউটি কোন বাসার জন্য।
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * এই রিভিউটি কোন ইউজার দিয়েছেন।
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
