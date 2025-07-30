<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasCustomSlug;
use Database\Factories\UserFactory;
use Exception;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static where(string $string, mixed $value)
 * @method static count()
 */
class User extends Authenticatable implements HasAvatar, FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasCustomSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'name',
        'phone',
        'email',
        'password',
        'avatar_url',
        'social_links',
        'bio',
        'reviews_count',
        'average_rating',
        'type',
        'status',
    ];

    /**
     * Define which field to use for slug generation.
     */
    public function getSluggableField(): string
    {
        return 'name';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'social_links' => 'array'
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug instead of id in routes
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
        return $this->$avatarColumn ? Storage::url($this->$avatarColumn) : null;
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    /**
     * একজন ইউজারের সকল রিভিউ।
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * একজন ইউজারের একটি টেস্টিমোনিয়াল।
     */
    public function testimonial(): HasOne
    {
        return $this->hasOne(Testimonial::class);
    }

    /**
     * Get all of the messages sent by the User.
     * একজন ব্যবহারকারী অনেকগুলো মেসেজ পাঠাতে পারেন।
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function wishlistedProperties(): BelongsToMany
    {
        // একজন ইউজারের অনেকগুলো wishlisted প্রপার্টি থাকতে পারে
        return $this->belongsToMany(Property::class, 'wishlists')
            ->withTimestamps();
    }

    /**
     * একটি helper মেথড, যা চেক করে একটি প্রপার্টি wishlisted কি না।
     *
     * @param Property $property
     * @return bool
     */
    public function hasWishlisted(Property $property): bool
    {
        // --- এখানে মূল পরিবর্তনটি করা হয়েছে ---
        return $this->wishlistedProperties()
            // পিভট টেবিলের নাম ('wishlists') সহ কলামের নাম উল্লেখ করা হচ্ছে
            ->where('wishlists.property_id', $property->id)
            ->exists();
    }

    public function wishlists(): HasMany
    {
        // একজন ইউজারের অনেকগুলো wishlist এন্ট্রি থাকতে পারে
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Get all of the posts for the User.
     * একজন User (লেখক) অনেকগুলো Post তৈরি করতে পারে।
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all the comments for the User.
     * একজন User অনেকগুলো Comment করতে পারে।
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function commentReactions(): HasMany
    {
        return $this->hasMany(CommentReaction::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // --- প্যানেলের আইডি অনুযায়ী অ্যাক্সেস নিয়ন্ত্রণ ---

        // যদি প্যানেলটি 'admin' হয়
        if ($panel->getId() === 'admin') {
            // শুধুমাত্র 'Admin' রোলের ব্যবহারকারীরাই প্রবেশ করতে পারবে
            return $this->hasRole('super_admin');
        }

        // যদি প্যানেলটি 'app' (ইউজার প্যানেল) হয়
        if ($panel->getId() === 'user') {
            // অ্যাডমিন এবং অন্যান্য সব লগইন করা ব্যবহারকারী প্রবেশ করতে পারবে
            return $this->hasRole(['user','super-admin']);
        }

        // অন্য কোনো প্যানেল থাকলে ডিফল্টভাবে অ্যাক্সেস দেওয়া হবে না
        return false;
    }

}
