<?php

namespace App\Providers;

use App\Models\FloorPlan;
use App\Models\Media;
use App\Models\Message;
use App\Models\Post;
use App\Models\Property;
use App\Models\Review;
use App\Models\Testimonial;
use App\Models\User;
use App\Observers\FloorPlanObserver;
use App\Observers\MediaObserver;
use App\Observers\MessageObserver;
use App\Observers\PostObserver;
use App\Observers\PropertyObserver;
use App\Observers\ReviewObserver;
use App\Observers\TestimonialObserver;
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
        Media::observe(MediaObserver::class);
        FloorPlan::observe(FloorPlanObserver::class);
        Message::observe(MessageObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Post::observe(PostObserver::class);

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->circular()
                ->locales(['en','bn']); // also accepts a closure
        });
    }
}
