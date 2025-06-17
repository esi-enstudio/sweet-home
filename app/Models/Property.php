<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @method static where(string $string, int $int)
 */
class Property extends Model
{
    use HasSlug;

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'environment',
        'property_type',
        'tenant_type',
        'total_area',
        'bedrooms',
        'attached_bathroom',
        'shared_bathroom',
        'dining_rooms',
        'living_rooms',
        'study_rooms',
        'store_rooms',
        'balconies',
        'floor_plan',
        'floor_number',
        'flooring',
        'walls',
        'windows',
        'condition',
        'facing',
        'available_from',
        'views_count',
        'is_urgent',
        'is_available',
        'listing_type',
        'average_rating',
        'review_count',
    ];

    protected $casts = [
        'floor_number' => 'array',
        'floor_plan' => 'array',
    ];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // Use the 'title' field to generate the slug
            ->saveSlugsTo('slug')        // Save slug to 'slug' column
            ->doNotGenerateSlugsOnUpdate(); // Optional: Prevent slug change after update
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function amenity(): HasOne
    {
        return $this->hasOne(Amenity::class);
    }

    public function rentAndAdditionalCost(): HasOne
    {
        return $this->hasOne(RentAndAdditionalCosts::class);
    }

    public function rentalTerms(): HasOne
    {
        return $this->hasOne(RentalTerms::class);
    }

    public function contactNumber(): HasOne
    {
        return $this->hasOne(ContactNumber::class);
    }

    public function media(): HasOne
    {
        return $this->hasOne(Media::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }

    /**
     * একটি বাসার সকল রিভিউ।
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * গড় রেটিং ক্যালকুলেট করার জন্য একটি Helper মেথড
     */
    public function averageRating(): float
    {
        // reviews_avg_rating নামে একটি অ্যাট্রিবিউট থাকলে সেটি ব্যবহার করবে,
        // নাহলে সরাসরি ডাটাবেস থেকে অ্যাভারেজ ক্যালকুলেট করবে।
        return $this->reviews()->avg('rating') ?? 0;
    }
}



