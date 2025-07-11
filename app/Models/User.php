<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasCustomSlug;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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
        'custom_fields',
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
            'custom_fields' => 'array'
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
            return $this->hasRole('user');
        }

        // অন্য কোনো প্যানেল থাকলে ডিফল্টভাবে অ্যাক্সেস দেওয়া হবে না
        return false;
    }
}
