<?php

namespace App\Providers;

use App\Models\Property;
use App\Models\Review;
use App\Models\User;
use App\Observers\PropertyObserver;
use App\Observers\ReviewObserver;
use App\Observers\UserObserver;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Review::observe(ReviewObserver::class);
        Property::observe(PropertyObserver::class);

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->circular()
                ->locales(['en','bn']); // also accepts a closure
        });
    }
}
