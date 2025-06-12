<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;

    protected function handleRecordCreation(array $data): Model
    {
//        dd($data);
        return DB::transaction(function () use ($data) {
            // 1. Generate a unique slug from the title
            $baseSlug = Str::slug($data['title']);
            $slug = $baseSlug;
            $counter = 1;

            // Check for uniqueness in the database and append numbers if needed
            while (static::getModel()::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // 1. Create the Property record
            $propertyData = [
                'user_id'           => auth()->id(),
                'slug'              => $slug,
                'title'             => $data['title'],
                'address'           => $data['address'],
                'landmark'          => $data['landmark'] ?? null,
                'environment'       => $data['environment'] ?? null,
                'latitude'          => $data['latitude'] ?? null,
                'longitude'         => $data['longitude'] ?? null,
                'area_type'         => $data['area_type'] ?? null,
                'property_type'     => $data['property_type'] ?? null,
                'tenant_type'       => $data['tenant_type'] ?? null,
                'total_area'        => $data['total_area'] ?? null,
                'bedrooms'          => $data['bedrooms'] ?? null,
                'attached_bathroom' => $data['attached_bathroom'] ?? null,
                'shared_bathroom'   => $data['shared_bathroom'] ?? null,
                'dining_rooms'      => $data['dining_rooms'] ?? null,
                'living_rooms'      => $data['living_rooms'] ?? null,
                'study_rooms'       => $data['study_rooms'] ?? null,
                'store_rooms'       => $data['store_rooms'] ?? null,
                'balconies'         => $data['balconies'] ?? null,
                'floor_number'      => $data['floor_number'] ?? null,
                'flooring'          => $data['flooring'] ?? null,
                'walls'             => $data['walls'] ?? null,
                'windows'           => $data['windows'] ?? null,
                'condition'         => $data['condition'] ?? null,
                'facing'            => $data['facing'] ?? null,
                'available_from'    => $data['available_from'] ?? null,
                'is_urgent'         => $data['is_urgent'] ?? null,
                'listing_type'      => $data['listing_type'] ?? null,
                'floor_plan'        => $data['floor_plan'] ?? null,
            ];
            $property = static::getModel()::create($propertyData);

            // 2. Create related records
            // Amenities
            $property->amenity()->create([
                'nearby_facilities'     => $data['nearby_facilities'] ?? null,
                'natural_environments'  => $data['natural_environments'] ?? null,
                'gas_connection'        => $data['gas_connection'] ?? null,
                'kitchen_type'          => $data['kitchen_type'] ?? null,
                'electricity_type'      => $data['electricity_type'] ?? null,
                'water_quality'         => $data['water_quality'] ?? null,
                'water_tank'            => $data['water_tank'] ?? null,
                'backup_power'          => $data['backup_power'] ?? null,
                'has_lift'              => $data['has_lift'] ?? null,
                'has_parking'           => $data['has_parking'] ?? null,
                'has_roof_access'       => $data['has_roof_access'] ?? null,
                'has_cctv'              => $data['has_cctv'] ?? null,
                'has_security_guard'    => $data['has_security_guard'] ?? null,
                'pets_allowed'          => $data['pets_allowed'] ?? null,
            ]);

            // Rent and Additional Costs
            $property->rentAndAdditionalCost()->create([
                'monthly_rent'              => $data['monthly_rent'] ?? null,
                'rent_includes'             => $data['rent_includes'] ?? null,
                'rent_increase_possibility' => $data['rent_increase_possibility'] ?? null,
                'is_negotiable'             => $data['is_negotiable'] ?? '',
                'water_bill'                => $data['water_bill'] ?? null,
                'gas_bill'                  => $data['gas_bill'] ?? null,
                'electricity_bill'          => $data['electricity_bill'] ?? null,
                'service_charge'            => $data['service_charge'] ?? null,
                'lift_charge'               => $data['lift_charge'] ?? null,
                'generator_charge'          => $data['generator_charge'] ?? null,
                'parking_fee'               => $data['parking_fee'] ?? null,
                'advance_rent_months'       => $data['advance_rent_months'] ?? null,
                'advance_payment_terms'     => $data['advance_payment_terms'] ?? null,
            ]);

            // Rental Terms
            $property->rentalTerms()->create([
                'contract_duration'             => $data['contract_duration'] ?? null,
                'contract_breach_terms'         => $data['contract_breach_terms'] ?? null,
                'tenant_eligibility'            => $data['tenant_eligibility'] ?? null,
                'identity_verification'         => $data['identity_verification'] ?? null,
                'background_check'              => $data['background_check'] ?? null,
                'payment_schedule'              => $data['payment_schedule'] ?? null,
                'house_usage_rules'             => $data['house_usage_rules'] ?? null,
                'maintenance_responsibility'    => $data['maintenance_responsibility'] ?? null,
                'damage_liability'              => $data['damage_liability'] ?? null,
            ]);

            // Contact Details
            $property->contactNumber()->create([
                'alternate_number'  => $data['alternate_number'] ?? null,
                'whatsapp_number'   => $data['whatsapp_number'] ?? null,
                'imo_number'        => $data['imo_number'] ?? null,
            ]);

            // Media
            $property->media()->create([
                'caption' => $data['caption'] ?? null,
                'video_url' => $data['video_url'] ?? null,
                'image_path' => $data['image_path'] ?? null,
            ]);

            return $property;
        });
    }

    // Optional: Redirect after creation
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
