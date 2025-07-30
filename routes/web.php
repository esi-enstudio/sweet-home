<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\PropertyViewController;
use App\Livewire\News\NewsDetailsPage;
use App\Livewire\News\NewsPage;
use App\Livewire\ContactPage;
use App\Livewire\HomeComponent;
use App\Livewire\LegalPageShow;
use App\Livewire\OurInspirationPage;
use App\Livewire\Properties;
use App\Livewire\SingleProperty;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeComponent::class)->name('home');


// --- সুনির্দিষ্ট রাউটগুলো আগে ---
// প্রপার্টির তালিকা এবং ফিল্টারিং-এর জন্য
Route::get('/inspiration', OurInspirationPage::class)->name('inspiration');

Route::get('/properties', Properties::class)->name('properties');

Route::get('/property/{property:slug}', SingleProperty::class)->name('single.property');

Route::post('/properties/{property:slug}/track-view', [PropertyViewController::class, 'store'])
    ->name('properties.track-view')
    ->middleware('throttle:5,1');

Route::get('/news', NewsPage::class)->name('news.index');
Route::get('/news/{post:slug}', NewsDetailsPage::class)->name('news.show');
Route::post('/news/{post:slug}/track-view', [NewsViewController::class, 'store'])
    ->name('news.track-view')
    ->middleware('throttle:5,1');

Route::get('/contact', ContactPage::class)->name('contact');









// --- সাধারণ বা ওয়াইল্ডকার্ড রাউটগুলো পরে ---
// এই রাউটটি '/terms-and-conditions', '/privacy-policy' ইত্যাদি হ্যান্ডেল করবে
Route::get('/{page:slug}', LegalPageShow::class)->name('legal.page');

// --- ফলব্যাক রাউটটি অবশ্যই সব রাউটের শেষে থাকবে ---
Route::fallback(FallbackController::class);
