<?php

use App\Livewire\HomeComponent;
use App\Livewire\Pages\ListingDetails;
use App\Livewire\Pages\Listings;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/listings', Listings::class)->name('listings');
Route::get('/listing/{property?}/details', ListingDetails::class)->name('listing.details');


Route::get('/test-slug', function () {
    $banglaTitle = 'ভৈরবের কেন্দ্রস্থলে আধুনিক ফ্ল্যাট';
    $englishTitle = 'Modern Flat in Bhairab';

    echo "<h1>Testing Slug Generation</h1>";

    // --- পরীক্ষা ১: Laravel-এর ডিফল্ট Str::slug ---
    echo "<h3>Test 1: Laravel's Default Str::slug</h3>";
    echo "<b>Input:</b> " . $banglaTitle . "<br>";
    echo "<b>Output:</b> " . Str::slug($banglaTitle) . "<br><hr>";

    // --- পরীক্ষা ২: Laravel-এর Str::slug সাথে language প্যারামিটার ---
    // এটিই spatie প্যাকেজটি ব্যাকগ্রাউন্ডে ব্যবহার করে
    echo "<h3>Test 2: Str::slug with 'bn' language</h3>";
    echo "<b>Input:</b> " . $banglaTitle . "<br>";
    echo "<b>Output:</b> " . Str::slug($banglaTitle, '-', 'bn') . "<br><hr>";

    echo "<h3>Test 2.1: English Title with 'bn' language</h3>";
    echo "<b>Input:</b> " . $englishTitle . "<br>";
    echo "<b>Output:</b> " . Str::slug($englishTitle, '-', 'bn') . "<br><hr>";

    // --- পরীক্ষা ৩: সরাসরি Symfony String Component ব্যবহার করে ---
    echo "<h3>Test 3: Direct Symfony String Component</h3>";
    $slugger = new \Symfony\Component\String\Slugger\AsciiSlugger('bn');
    $slug = $slugger->slug($banglaTitle);
    echo "<b>Input:</b> " . $banglaTitle . "<br>";
    echo "<b>Output:</b> " . $slug . "<br><hr>";

});
