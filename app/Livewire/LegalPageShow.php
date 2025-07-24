<?php

namespace App\Livewire;

use App\Models\LegalPage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class LegalPageShow extends Component
{
    public LegalPage $page;

    // Route Model Binding ব্যবহার করে স্বয়ংক্রিয়ভাবে পেজ লোড হবে
    public function mount(LegalPage $page): void
    {
        // যদি পেজটি পাবলিশ করা না থাকে, তাহলে 404 পেজ দেখাও
        if (!$page->is_published) {
            abort(404);
        }

        $this->page = $page;
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.legal-page-show');
    }
}
