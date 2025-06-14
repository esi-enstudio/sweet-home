<?php

use App\Livewire\HomeComponent;
use App\Livewire\Pages\ListingDetails;
use App\Livewire\Pages\Listings;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/listing', Listings::class)->name('listing');
Route::get('/listing/details', ListingDetails::class)->name('listing.details');




//TextInput::make('address')
//    ->label('ঠিকানা')
//    ->helperText('এলাকার নাম, রাস্তা(যেমন: বঙ্গবন্ধু সরণি রোড, ভৈরব বাজার, ভৈরব, কিশোরগঞ্জ)।')
//    ->maxLength(255),
//
//TextInput::make('landmark')
//    ->label('সুপরিচিত স্থান')
//    ->helperText('কাছাকাছি সুপরিচিত স্থান (যেমন: “আনোয়ারা হাসপাতালের বিপরীত পাশে”)')
//    ->maxLength(255),
//
//TextInput::make('latitude')
//    ->label('অক্ষাংশ (latitude)')
//    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ  24.321456')
//    ->numeric(),
//
//TextInput::make('longitude')
//    ->label('দ্রাঘিমাংশ (longitude)')
//    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ 90.369852')
//    ->numeric(),
//
//Select::make('area_type')
//    ->label('এলাকার ধরন')
//    ->helperText('শহুরে (উচ্চ-ঘনত্ব), আধা-শহুরে, বা গ্রামীণ এলাকা')
//    ->options([
//        'urban' => 'শহুরে',
//        'semi_urban' => 'আধা শহুরে',
//        'rural' => 'গ্রামীণ',
//    ]),
