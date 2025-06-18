<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @method static where(string $string, int $int)
 */
class Property extends Model
{
    use HasSlug, SoftDeletes, HasUniqueSlug;

    protected $fillable = [
        'slug','user_id','title','description','property_type','listing_type','tenant_type','total_area','bedrooms','bathrooms','balconies','floor_number','facing','thumbnail','division_id','district_id','upazila_id','union_id','area_name','full_address','landmark','latitude','longitude','rent_amount','rent_negotiable','service_charge','security_deposit','rent_summary','available_from','is_available','house_rules','contact_number_primary','contact_whatsapp','views_count',
    ];

    protected $casts = [
        'available_from' => 'datetime',
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



    // --- RELATIONSHIPS ---

    // Belongs To User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Belongs To Location Hierarchy
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }

    public function union(): BelongsTo
    {
        return $this->belongsTo(Union::class);
    }

    // Has Many Media Files
    public function media(): HasMany
    {
        return $this->hasMany(Media::class)->orderBy('order_column');
    }

    /**
     * The amenities that belong to the property.
     */
    public function amenities(): BelongsToMany
    {
        // একটি প্রপার্টির অনেকগুলো সুবিধা থাকতে পারে
        return $this->belongsToMany(Amenity::class)
            ->withPivot('details') // <-- পিভট টেবিলের 'details' কলামটি অ্যাক্সেস করার জন্য
            ->withTimestamps();
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
