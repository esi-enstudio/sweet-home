<?php

use App\Livewire\HomeComponent;
use App\Livewire\Pages\ListingDetails;
use App\Livewire\Pages\Listings;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/listings', Listings::class)->name('listings');
Route::get('/listing/{property?}/details', ListingDetails::class)->name('listing.details');
