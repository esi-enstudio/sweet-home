<?php

namespace App\Livewire;

use App\Models\PropertyType;
use App\Models\Tenant;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PropertySearchForm extends Component
{
    // ফর্মের ফিল্ডগুলোর জন্য পাবলিক প্রোপার্টি
    public ?int $selectedTenant = null;
    public ?string $selectedListing = null; // 'rent', 'sell' ইত্যাদি
    public ?int $selectedType = null;

    /**
     * ড্রপডাউনের অপশনগুলো লোড করে এবং ক্যাশে রাখে।
     */
    #[Computed(seconds: 86400, cache: true, key: 'search-form-options')] // ২৪ ঘণ্টা ক্যাশে থাকবে
    public function formOptions(): array
    {
        return [
            'tenants' => Tenant::all(['id', 'name']),
            'propertyTypes' => PropertyType::all(['id', 'name']),
            // Property Status একটি enum, তাই আমরা এটি সরাসরি হার্ড-কোড করতে পারি
            'listingTypes' => ['rent', 'sell', 'buy'],
        ];
    }

    /**
     * ফর্ম সাবমিট হলে এই মেথডটি কল হবে।
     */
    public function searchProperties(): null
    {
        // যে ফিল্টারগুলোর মান আছে, শুধু সেগুলো নিয়ে একটি অ্যারে তৈরি করুন
        $filters = array_filter([
            'selectedTenants' => $this->selectedTenant ? [$this->selectedTenant] : [], // PropertyList কম্পোনেন্ট অ্যারে আশা করে
            'selectedListingTypes' => $this->selectedListing ? [$this->selectedListing] : [],
            'selectedTypes' => $this->selectedType ? [$this->selectedType] : [],
        ]);

        // PropertyList কম্পোনেন্টের রাউটে ফিল্টারগুলো সহ রিডাইরেক্ট করুন
        return $this->redirect(route('properties', $filters));
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.property-search-form');
    }
}
