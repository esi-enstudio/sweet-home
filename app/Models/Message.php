<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = ['property_id', 'user_id', 'message', 'is_read'];

    /**
     * Get the property that the message was sent for.
     * প্রতিটি মেসেজ একটি নির্দিষ্ট প্রপার্টির অন্তর্গত।
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the user who sent the message (if they were logged in).
     * প্রতিটি মেসেজ একজন ব্যবহারকারীর হতে পারে (যদি তিনি লগইন করা থাকেন)।
     */
    public function sender(): BelongsTo
    {
        // 'user_id' কলামকে sender() নামে রিলেশন দিচ্ছি, যা বেশি অর্থবহ
        return $this->belongsTo(User::class);
    }
}
