<?php

use App\Livewire\HomeComponent;
use App\Livewire\Pages\ListingDetails;
use App\Livewire\Pages\Listings;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/listing', Listings::class)->name('listing');
Route::get('/listing/{property}/details', ListingDetails::class)->name('listing.details');

