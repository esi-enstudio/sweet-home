<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurInspiration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'photo',
        'social_links',
        'is_visible',
        'order_column',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'social_links' => 'array', // <-- JSON কলামকে অ্যারে হিসেবে কাস্ট করুন
        'is_visible' => 'boolean',
    ];
}
