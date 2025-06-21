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
    use SoftDeletes, HasUniqueSlug;

    protected $fillable = [
        'user_id','property_type_id','tenant_id','division_id','district_id','upazila_id','union_id','property_id','slug','title','description','listing_type','total_area','bedrooms','bathrooms','balconies','floor_number','facing','year_built','thumbnail','landmark','address','latitude','longitude','rent_amount','rent_negotiable','service_charge','security_deposit','rent_summary','available_from','is_available','is_featured','house_rules','contact_number_primary','contact_whatsapp','views_count','status'
    ];

    protected $casts = [
        'available_from' => 'datetime',
    ];

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
     * Get the property type that owns the Property.
     */
    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'property_tenant');
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

    public function floorPlans(): HasMany
    {
        return $this->hasMany(FloorPlan::class);
    }

    /**
     * The facts that belong to the Property.
     */
    public function spaces(): BelongsToMany
    {
        return $this->belongsToMany(SpaceOverview::class, 'property_space_overview')
            ->withPivot('dimensions')
            ->withTimestamps(); // পিভট টেবিলের 'dimensions' কলামটি অ্যাক্সেস করার জন্য
    }

    /**
     * Get all of the messages for the Property.
     * একটি প্রপার্টির জন্য অনেকগুলো মেসেজ থাকতে পারে।
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
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
