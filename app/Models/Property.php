<?php

namespace App\Models;

use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, int $int)
 * @property mixed|string $property_id
 * @property int|mixed|string|null $user_id
 */
class Property extends Model
{
    use SoftDeletes, HasUniqueSlug;

    protected $fillable = [
        'user_id','property_type_id','tenant_id','division_id','district_id','upazila_id','union_id','property_id','slug','title','description','listing_type','total_area','bedrooms','bathrooms','balconies','floor_number','facing','year_built','thumbnail','landmark','address','latitude','longitude','rent_amount','rent_negotiable','service_charge','security_deposit','rent_summary','available_from','is_available','is_featured','house_rules','contact_number_primary','contact_whatsapp','views_count','status'
    ];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'title';
    }

    protected static function booted(): void
    {
        // যখন একটি নতুন প্রপার্টি তৈরি হবে
        static::creating(function (Property $property) {
            // যদি user_id আগে থেকে সেট করা না থাকে, তাহলে বর্তমান লগইন করা ইউজারকে সেট কর
            if (auth()->check() && !$property->user_id) {
                $property->user_id = auth()->id();
            }

            // --- নতুন Property ID জেনারেট করার লজিক ---
            $property->property_id = self::generateUniquePropertyId($property);
        });

        // ... created, deleted, updated ইভেন্টগুলো
    }

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
    public function spaceOverviews(): BelongsToMany
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


    /**
     * Generate a unique and structured Property ID.
     *
     * @param Property $property The property instance before it's saved.
     * @return string
     */
    private static function generateUniquePropertyId(Property $property): string
    {
        // --- ধাপ ১: লোকেশনের অংশগুলো তৈরি করা ---
        $prefix = 'SH';

        // রিলেশনশিপ থেকে ডেটা না নিয়ে সরাসরি আইডি দিয়ে ডেটাবেস থেকে মডেল আনাই ভালো,
        // কারণ creating ইভেন্টে রিলেশনশিপ লোড নাও হতে পারে।
        $divisionCode = Str::upper(Str::substr(Division::find($property->division_id)?->name ?? '', 0, 3));
        $districtCode = Str::upper(Str::substr(District::find($property->district_id)?->name ?? '', 0, 3));
        $upazilaCode  = Str::upper(Str::substr(Upazila::find($property->upazila_id)?->name ?? '', 0, 3));
        $unionCode    = $property->union_id ? Str::upper(Str::substr(Union::find($property->union_id)?->name ?? '', 0, 3)) : '';

        $baseId = $prefix . $divisionCode . $districtCode . $upazilaCode . $unionCode;

        // --- ধাপ ২: সর্বশেষ নাম্বারটি খুঁজে বের করা ---
        // এই বেস আইডি দিয়ে শেষ প্রপার্টিটি খুঁজে বের করুন
        $lastProperty = self::where('property_id', 'LIKE', $baseId . '%')
            ->orderBy('property_id', 'desc')
            ->first();

        $newNumber = 1;
        if ($lastProperty) {
            // শেষ প্রপার্টির আইডি থেকে নাম্বারটি আলাদা করুন
            $lastNumber = (int) substr($lastProperty->property_id, strlen($baseId));
            $newNumber = $lastNumber + 1;
        }

        // --- ধাপ ৩: সম্পূর্ণ নতুন আইডি তৈরি করা ---
        // নাম্বারটিকে ৫ ডিজিটে ফরম্যাট করুন (e.g., 1 -> 00001)
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        return $baseId . $formattedNumber;
    }
}
