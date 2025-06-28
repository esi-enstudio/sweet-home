<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $image_path
 */
class FloorPlan extends Model
{
    use HasUniqueSlug;

    protected $fillable = ['property_id','name','slug','image_path','description','total_area','others'];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * Get the property that owns the FloorPlan.
     * প্রতিটি ফ্লোর প্ল্যান একটি নির্দিষ্ট প্রপার্টির অন্তর্গত।
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
