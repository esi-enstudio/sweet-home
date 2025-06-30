<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Properties extends Component
{
    use WithPagination;

    #[Url]
    public ?string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * প্রপার্টির তালিকা লোড করে (পেজিনেশন সহ)।
     * পেজিনেটেড ফলাফলের উপর ক্যাশিং ব্যবহার করা উচিত নয়।
     */
    #[Computed]
    public function properties(): CursorPaginator
    {
        return Property::query()
            ->select(['id','user_id','thumbnail','listing_type','rent_amount','address','title','slug','bedrooms','bathrooms','total_area','created_at'])
            ->with(['user'])
            ->where('is_available', 1)
            ->where('status', 'approved')
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc') // টাইব্রেকারের জন্য দ্বিতীয় ORDER BY
            ->cursorPaginate(5);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.properties');
    }
}
