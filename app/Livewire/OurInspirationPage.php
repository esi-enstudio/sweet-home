<?php

namespace App\Livewire;

use App\Models\OurInspiration;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
class OurInspirationPage extends Component
{
    /**
     * দলের সদস্যদের তালিকা লোড করে এবং ক্যাশে রাখে।
     */
    #[Computed(seconds: 86400, cache: true, key: 'our-inspiration-page')] // ১ দিন ক্যাশে থাকবে
    public function inspirationMembers(): Collection
    {
        return OurInspiration::query()
            ->where('is_visible', true) // শুধুমাত্র দৃশ্যমান সদস্যদের দেখাবে
            ->orderBy('order_column')   // আপনার দেওয়া ক্রম অনুযায়ী সাজানো
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.our-inspiration-page')
            ->title('Our Inspiration' .' - '. config('app.name'));
    }
}
