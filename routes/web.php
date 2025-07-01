<?php

use App\Livewire\AmenityProperties;
use App\Livewire\HomeComponent;
use App\Livewire\Properties;
use App\Livewire\SingleProperty;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');

// প্রপার্টির তালিকা এবং ফিল্টারিং-এর জন্য
Route::get('/properties', Properties::class)->name('properties');

// সিঙ্গেল প্রপার্টির ডিটেইলস দেখানোর জন্য
// এখানে Route Model Binding ব্যবহার করা হচ্ছে
Route::get('/properties/{property:slug}', SingleProperty::class)->name('single.property');

Route::get('/amenities/{amenity:slug}', AmenityProperties::class)->name('amenity.properties');
