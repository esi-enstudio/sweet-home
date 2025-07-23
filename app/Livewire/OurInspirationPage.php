<?php

namespace App\Livewire;

use App\Models\OurInspiration;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OurInspirationPage extends Component
{
    public int $perPage = 6; // ডিফল্টভাবে ৬টি আইটেম দেখানো হবে
    public int $totalMembers; // মোট সদস্যের সংখ্যা ধরে রাখার জন্য

    /**
     * mount() মেথডে আমরা মোট সদস্যের সংখ্যাটি একবার লোড করে নেব।
     */
    public function mount(): void
    {
        // এই কুয়েরিটি শুধু একবার চলবে, পারফরম্যান্সের জন্য ভালো
        $this->totalMembers = OurInspiration::where('is_visible', true)->count();
    }

    /**
     * দলের সদস্যদের তালিকা লোড করে এবং ক্যাশে রাখে।
     */
    #[Computed]
    public function inspirationMembers(): Collection
    {
        return OurInspiration::query()
            ->where('is_visible', true)
            ->orderBy('order_column')
            ->take($this->perPage) // <-- take() ব্যবহার করে নির্দিষ্ট সংখ্যক আইটেম নেওয়া হচ্ছে
            ->get();
    }

    /**
     * "Load More" বাটনে ক্লিক করলে এই মেথডটি কল হবে।
     */
    public function loadMore(): void
    {
        $this->perPage += 6; // প্রতিবার আরও ৬টি আইটেম লোড হবে
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.our-inspiration-page')
            ->title('Our Inspiration' .' - '. config('app.name'));
    }
}
