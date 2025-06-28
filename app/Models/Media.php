<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Media extends Model implements Sortable
{
    use SortableTrait;

    protected $fillable = ['property_id', 'path','showcase_image_path','video_url', 'type', 'caption', 'order_column',];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

