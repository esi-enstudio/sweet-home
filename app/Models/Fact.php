<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fact extends Model
{
    use HasUniqueSlug;

    protected $fillable = ['name','slug','icon_class'];

    /**
     * The properties that have this amenity.
     */
    public function properties(): BelongsToMany
    {
        // একটি সুবিধার অনেকগুলো প্রপার্টি থাকতে পারে
        return $this->belongsToMany(Property::class)
            ->withPivot('dimensions')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
    }
}
