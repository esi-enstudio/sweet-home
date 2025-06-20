<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FloorPlan extends Model
{
    /**
     * Get the property that owns the FloorPlan.
     * প্রতিটি ফ্লোর প্ল্যান একটি নির্দিষ্ট প্রপার্টির অন্তর্গত।
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
