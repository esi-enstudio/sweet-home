<?php

namespace App\Livewire\Blog;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class SidebarSearch extends Component
{
    public string $search = '';

    public function performSearch(): null
    {
        // ব্লগ সার্চ পেজের রাউটে রিডাইরেক্ট করুন
        return $this->redirect(route('blogs', ['search' => $this->search]));
    }




    public function render(): Factory|View|Application
    {
        return view('livewire.blog.sidebar-search');
    }
}
