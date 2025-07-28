<?php

use App\Http\Controllers\FallbackController;
use App\Livewire\Blog\BlogDetailsPage;
use App\Livewire\Blog\BlogPage;
use App\Livewire\ContactPage;
use App\Livewire\HomeComponent;
use App\Livewire\LegalPageShow;
use App\Livewire\OurInspirationPage;
use App\Livewire\Properties;
use App\Livewire\SingleProperty;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyViewController;

Route::get('/', HomeComponent::class)->name('home');

// প্রপার্টির তালিকা এবং ফিল্টারিং-এর জন্য
Route::get('/properties', Properties::class)->name('properties');

// সিঙ্গেল প্রপার্টির ডিটেইলস দেখানোর জন্য
// এখানে Route Model Binding ব্যবহার করা হচ্ছে
Route::get('/property/{property:slug}', SingleProperty::class)->name('single.property');


Route::post('/properties/{property:slug}/track-view', [PropertyViewController::class, 'store'])
    ->name('properties.track-view')
    ->middleware('throttle:5,1');

Route::get('/inspiration', OurInspirationPage::class)->name('inspiration');

Route::get('/contact', ContactPage::class)->name('contact');

// এই রাউটটি '/terms-and-conditions', '/privacy-policy' ইত্যাদি হ্যান্ডেল করবে
Route::get('/{page:slug}', LegalPageShow::class)->name('legal.page');


Route::get('/news', BlogPage::class)->name('blog.index');
Route::get('/news/{post:slug}', BlogDetailsPage::class)->name('blog.show');

// --- ফলব্যাক রাউটটি অবশ্যই সব রাউটের শেষে থাকবে ---
Route::fallback(FallbackController::class);
