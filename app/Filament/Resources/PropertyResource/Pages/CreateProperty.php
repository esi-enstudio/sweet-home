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
                'user_id' => auth()->id(), // Assuming authenticated user is the owner
                'slug' => $slug,
                'title' => $data['title'],
                'address' => $data['address'] ?? null,
            ];
            $property = static::getModel()::create($propertyData);

            // 2. Create related records
            // Amenities
            $property->amenity()->create([
                'nearby_facilities' => $data['nearby_facilities'] ?? null,
                'natural_environments' => $data['natural_environments'] ?? null,
            ]);

            // Rent and Additional Costs
            $property->rentAndAdditionalCost()->create([
                'monthly_rent' => $data['monthly_rent'] ?? null,
                'rent_includes' => $data['rent_includes'] ?? null,
            ]);

            // Rental Terms
            $property->rentalTerms()->create([
                'contract_duration' => $data['contract_duration'] ?? null,
                'contract_breach_terms' => $data['contract_breach_terms'] ?? null,
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
