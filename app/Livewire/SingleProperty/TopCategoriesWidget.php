<?php

namespace App\Livewire\SingleProperty;

use App\Models\PropertyType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TopCategoriesWidget extends Component
{
    /**
     * টপ ক্যাটাগরিগুলো লোড করে, যেখানে প্রপার্টি সংখ্যা অনুযায়ী সাজানো থাকবে।
     */
    #[Computed(seconds: 7200, cache: true, key: 'top-categories-widget')] // ২ ঘণ্টা ক্যাশে থাকবে
    public function categories(): Collection
    {
        return PropertyType::query()
            // শুধুমাত্র সেই ক্যাটাগরিগুলো দেখাও যেগুলোর অধীনে কমপক্ষে একটি প্রপার্টি আছে
            ->where('properties_count', '>', 0)
            // প্রপার্টি সংখ্যা অনুযায়ী বড় থেকে ছোট ক্রমে সাজান
            ->orderByDesc('properties_count')
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.single-property.top-categories-widget');
    }
}
