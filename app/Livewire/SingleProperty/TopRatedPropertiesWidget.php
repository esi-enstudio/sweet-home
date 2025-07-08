<?php

namespace App\Livewire\SingleProperty;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TopRatedPropertiesWidget extends Component
{
    /**
     * টপ-রেটেড প্রপার্টিগুলো গণনা এবং ক্যাশে করে।
     */
    #[Computed(seconds: 21600, cache: true, key: 'top-rated-properties')] // ৬ ঘণ্টা ক্যাশে থাকবে
    public function topProperties(): Collection
    {
        // স্কোর-ভিত্তিক কুয়েরি তৈরি
        return Property::query()
            ->select('id', 'title', 'slug', 'thumbnail', 'rent_amount', 'average_rating','reviews_count')
            ->withCount('reviews') // রিভিউ সংখ্যা গণনার জন্য
            ->where('is_available', true)
            ->where('status', 'approved')

            // --- স্কোর গণনার জন্য DB::raw() ---
            ->addSelect(DB::raw(
                ' (
                    (IFNULL(average_rating, 0) * 20) +
                    (IFNULL(reviews_count, 0) * 5) +
                    (IFNULL(views_count, 0) * 0.5)
                  ) AS popularity_score'
            ))

            // সর্বোচ্চ স্কোর অনুযায়ী সাজান
            ->orderByDesc('popularity_score')
            ->orderByDesc('created_at') // একই স্কোর হলে নতুনগুলো আগে
            ->take(3) // সেরা ৩টি প্রপার্টি নিন
            ->get();
    }
    public function render(): Factory|View|Application
    {
        return view('livewire.single-property.top-rated-properties-widget');
    }
}
