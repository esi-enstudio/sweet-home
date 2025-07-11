<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TestimonialSliderWidget extends Component
{
    #[Computed(seconds: 7200, cache: true, key: 'testimonials-for-homepage')]
    public function testimonials(): Collection
    {
        return Testimonial::with(['user'])
            ->where('is_published', 1)
            ->orderBy('order_column')
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.testimonial-slider-widget');
    }
}
