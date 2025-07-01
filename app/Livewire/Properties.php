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

    // --- নতুন প্রোপার্টি: কুয়েরি সম্পাদনের সময় ধরে রাখার জন্য ---
    public float $queryTime = 0;

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
        // কুয়েরি শুরু হওয়ার সময় রেকর্ড করুন
        $startTime = microtime(true);

        $properties = Property::query()
            ->select(['id','user_id','thumbnail','listing_type','rent_amount','address','title','slug','bedrooms','bathrooms','total_area','created_at'])
            ->with(['user'])
            ->where('is_available', 1)
            ->where('status', 'approved')
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc') // টাইব্রেকারের জন্য দ্বিতীয় ORDER BY
            ->cursorPaginate(5);

        // কুয়েরি শেষ হওয়ার সময় রেকর্ড করুন এবং পার্থক্য গণনা করুন
        $endTime = microtime(true);
        $this->queryTime = $endTime - $startTime;

        return $properties;
    }

    /**
     * ফিল্টার করা ফলাফলের মোট সংখ্যা গণনা এবং ক্যাশে করে।
     * এই কুয়েরিটি properties() মেথডের ফিল্টারিং লজিকের সাথে সামঞ্জস্যপূর্ণ।
     */
    #[Computed(persist: true, seconds: 300)] // ৫ মিনিটের জন্য ফলাফল ক্যাশে থাকবে
    public function totalResults(): int
    {
        // PropertyList কম্পোনেন্টের জন্য
        return Property::query()
            ->where('is_available', 1)
            ->where('status', 'approved')
            // properties() মেথডে ব্যবহৃত একই ফিল্টারগুলো এখানেও প্রয়োগ করতে হবে
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            // ->when($this->property_type_id, ...) ইত্যাদি
            ->count();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.properties')
            ->title('List Properties' .' :: '. config('app.name'));
    }
}
