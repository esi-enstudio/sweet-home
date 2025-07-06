<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SingleProperty extends Component
{
    public Property $property;

    public function mount(Property $property): void
    {
        // View পেজের জন্য প্রয়োজনীয় সব রিলেশনশিপ ইগার লোড করুন
        $this->property = $property->load([
            'user',
            'propertyType',
            'tenants', // Many-to-Many
            'media',
            'amenities',
            'spaceOverviews',
            'floorPlans',
            'reviews.user' // রিভিউ এবং রিভিউয়ারের তথ্য
        ]);
    }

    // "Related Properties" লোড করার জন্য
    #[Computed]
    public function relatedProperties(): Collection
    {
        // বর্তমান প্রপার্টির আইডি এবং অন্যান্য তথ্য
        $currentPropertyId = $this->property->id;
        $currentTypeId = $this->property->property_type_id;
        $currentDistrictId = $this->property->district_id;
        $currentUpazilaId = $this->property->upazila_id;

        // --- Amenity আইডিগুলোকে একটি অ্যারে হিসেবে প্রস্তুত করুন ---
        $currentAmenitiesIds = $this->property->amenities->pluck('id')->toArray();

        // স্কোর-ভিত্তিক কুয়েরি তৈরি
        $query = Property::query()
            ->select('properties.*') // সব কলাম সিলেক্ট করুন
            ->with(['user:id,name', 'propertyType:id,name'])
            ->where('properties.id', '!=', $currentPropertyId)
            ->where('is_available', true)
            ->where('status', 'approved');

        // --- স্কোর গণনার জন্য DB::raw() এবং বাইন্ডিং ---
        $relevanceScoreSql = "
            (
                (CASE WHEN properties.property_type_id = ? THEN 50 ELSE 0 END) +
                (CASE WHEN properties.district_id = ? THEN 30 ELSE 0 END) +
                (CASE WHEN properties.upazila_id = ? THEN 20 ELSE 0 END) +
                (IFNULL(properties.views_count, 0) * 0.1) +
                (IFNULL(properties.average_rating, 0) * 10)
            ) AS relevance_score
        ";
        $query->addSelect(DB::raw($relevanceScoreSql));
        // বাইন্ডিংগুলো এখানে যোগ করুন
        $query->addBinding([$currentTypeId, $currentDistrictId, $currentUpazilaId], 'select');


        // --- কমন amenity-র জন্য স্কোর যোগ করা (সঠিক পদ্ধতি) ---
        if (!empty($currentAmenitiesIds)) {
            // IN() ক্লজের জন্য কমা-সেপারেটেড স্ট্রিং তৈরি করুন
            $amenityIdList = implode(',', $currentAmenitiesIds);

            $amenityScoreSql = "
                (
                    SELECT SUM(5) FROM amenity_property
                    WHERE amenity_property.property_id = properties.id
                    AND amenity_property.amenity_id IN ({$amenityIdList})
                ) AS amenity_score
            ";
            $query->addSelect(DB::raw($amenityScoreSql));
            // এখানে আর addBinding এর প্রয়োজন নেই, কারণ আমরা সরাসরি ভ্যালু বসিয়ে দিয়েছি
        } else {
            // যদি কোনো amenity না থাকে, তাহলে স্কোর ০
            $query->addSelect(DB::raw("0 AS amenity_score"));
        }

        // চূড়ান্ত ফলাফল
        return $query
            ->orderByDesc('relevance_score') // সর্বোচ্চ স্কোর অনুযায়ী সাজান
            ->orderByDesc('amenity_score')
            ->latest('properties.created_at')
            ->take(2)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.single-property')
            ->title('Property Details' .' :: '. config('app.name'));
    }
}
