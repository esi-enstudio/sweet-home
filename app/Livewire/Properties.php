<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Tenant;
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

    // --- ফিল্টার এবং সর্টিং-এর জন্য প্রোপার্টি ---
    #[Url(as: 'q')]
    public string $search = '';

    #[Url(except: 'newest')]
    public string $sortBy = 'newest'; // ডিফল্ট সর্টিং

    #[Url()]
    public array $selectedTypes = [];

    #[Url()]
    public array $selectedTenant = [];

    #[Url()]
    public array $selectedAmenities = [];

    #[Url()]
    public ?int $bedrooms = null;

    #[Url()]
    public ?int $bathrooms = null;

    #[Url()]
    public ?int $balconies = null;

    #[Url()]
    public array $selectedListingTypes = [];

    // --- নতুন প্রোপার্টি: কুয়েরি সম্পাদনের সময় ধরে রাখার জন্য ---
    public float $queryTime = 0;


    /**
     * প্রপার্টির তালিকা লোড করে (পেজিনেশন সহ)।
     * পেজিনেটেড ফলাফলের উপর ক্যাশিং ব্যবহার করা উচিত নয়।
     */
    #[Computed]
    public function properties(): LengthAwarePaginator
    {
        // কুয়েরি শুরু হওয়ার সময় রেকর্ড করুন
        $startTime = microtime(true);

        $properties = Property::query()
            ->select(['id','user_id','thumbnail','listing_type','rent_amount','address','title','slug','bedrooms','bathrooms','balconies','total_area','tenant_id','created_at'])
            ->with(['user:id,name,avatar_url', 'propertyType:id,name'])
            ->where('is_available', 1)
            ->where('status', 'approved')
            // সার্চ ফিল্টার
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%')->orWhere('property_id', 'like', '%' . $this->search . '%'))
            // Property Type ফিল্টার (Checkbox)
            ->when($this->selectedTypes, fn($q) => $q->whereIn('property_type_id', $this->selectedTypes))
            // Tenant Type ফিল্টার (Checkbox)
            ->when($this->selectedTenant, fn($q) => $q->whereIn('tenant_id', $this->selectedTenant))
            // Amenities ফিল্টার (Checkbox - Many-to-Many)
            ->when($this->selectedAmenities, function ($q) {
                $q->whereHas('amenities', function ($subQuery) {
                    $subQuery->whereIn('amenities.id', $this->selectedAmenities);
                });
            })
            // Bedroom ফিল্টার
            ->when($this->bedrooms, fn($q) => $q->where('bedrooms', $this->bedrooms))
            // Bathroom ফিল্টার
            ->when($this->bathrooms, fn($q) => $q->where('bathrooms', $this->bathrooms))
            // Balcony ফিল্টার
            ->when($this->balconies, fn($q) => $q->where('balconies', $this->balconies))
            // Listing Type ফিল্টার (Checkbox)
            ->when($this->selectedListingTypes, fn($q) => $q->whereIn('listing_type', $this->selectedListingTypes))
            // সর্টিং লজিক
            ->when($this->sortBy === 'newest', fn($q) => $q->latest())
            ->when($this->sortBy === 'price_asc', fn($q) => $q->orderBy('rent_amount', 'asc'))
            ->when($this->sortBy === 'price_desc', fn($q) => $q->orderBy('rent_amount', 'desc'))
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc') // টাইব্রেকারের জন্য দ্বিতীয় ORDER BY
            ->paginate(5);

        // কুয়েরি শেষ হওয়ার সময় রেকর্ড করুন এবং পার্থক্য গণনা করুন
        $endTime = microtime(true);
        $this->queryTime = $endTime - $startTime;

        return $properties;
    }

    /**
     * সাইডবারে দেখানোর জন্য ফিল্টারের ডেটা লোড করে।
     */
    #[Computed]
    public function sidebarData(): array
    {
        return [
            'propertyTypes' => PropertyType::withCount('properties')->get(),
            'tenantTypes' => Tenant::withCount('properties')->get(),
            'amenities' => Amenity::withCount('properties')->get(),
            // Listing Type একটি enum, তাই এটি সরাসরি হার্ড-কোড করা যেতে পারে
        ];
    }

    // ফিল্টার পরিবর্তনের সময় পেজিনেশন রিসেট করার জন্য
    public function updated($property): void
    {
        if (in_array($property, ['search', 'selectedTypes', 'selectedTenant', 'selectedAmenities', 'bedrooms', 'bathrooms', 'balconies', 'selectedListingTypes'])) {
            $this->resetPage();
        }
    }

    /**
     * ফিল্টার করা ফলাফলের মোট সংখ্যা গণনা এবং ক্যাশে করে।
     * এই কুয়েরিটি properties() মেথডের ফিল্টারিং লজিকের সাথে সামঞ্জস্যপূর্ণ।
     */
    #[Computed] // ৫ মিনিটের জন্য ফলাফল ক্যাশে থাকবে
    public function totalResults(): int
    {
        // PropertyList কম্পোনেন্টের জন্য
        return Property::query()
            ->where('is_available', 1)
            ->where('status', 'approved')

            // properties() মেথডে ব্যবহৃত একই ফিল্টারগুলো এখানেও প্রয়োগ করতে হবে
            // সার্চ ফিল্টার
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            // Property Type ফিল্টার (Checkbox)
            ->when($this->selectedTypes, fn($q) => $q->whereIn('property_type_id', $this->selectedTypes))
            // Tenant Type ফিল্টার (Checkbox)
            ->when($this->selectedTenant, fn($q) => $q->whereIn('tenant_id', $this->selectedTenant))
            // Amenities ফিল্টার (Checkbox - Many-to-Many)
            ->when($this->selectedAmenities, function ($q) {
                $q->whereHas('amenities', function ($subQuery) {
                    $subQuery->whereIn('amenities.id', $this->selectedAmenities);
                });
            })
            // Bedroom ফিল্টার
            ->when($this->bedrooms, fn($q) => $q->where('bedrooms', $this->bedrooms))
            // Bathroom ফিল্টার
            ->when($this->bathrooms, fn($q) => $q->where('bathrooms', $this->bathrooms))
            // Balcony ফিল্টার
            ->when($this->balconies, fn($q) => $q->where('balconies', $this->balconies))
            // Listing Type ফিল্টার (Checkbox)
            ->when($this->selectedListingTypes, fn($q) => $q->whereIn('listing_type', $this->selectedListingTypes))
            // সর্টিং লজিক
            ->when($this->sortBy === 'newest', fn($q) => $q->latest())
            ->when($this->sortBy === 'price_asc', fn($q) => $q->orderBy('rent_amount', 'asc'))
            ->when($this->sortBy === 'price_desc', fn($q) => $q->orderBy('rent_amount', 'desc'))
            // ->when($this->property_type_id, ...) ইত্যাদি
            ->count();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.properties')
            ->title('List Properties' .' :: '. config('app.name'));
    }
}
