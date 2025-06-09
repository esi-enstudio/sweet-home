<?php

namespace App\Livewire\Pages;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Listings extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.pages.listings');
    }
}
