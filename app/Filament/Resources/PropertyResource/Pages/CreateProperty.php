<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Traits\ImageProcessingTrait;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CreateProperty extends CreateRecord
{
    use ImageProcessingTrait;

    protected static string $resource = PropertyResource::class;

    // Add these methods to automatically set the user_id
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // Set the logged-in user's ID

        $propertyId = Str::upper(Str::random(12));
        $data['property_id'] = $propertyId;

        // --- ধাপ খ: ছবি প্রসেস এবং মুভ করুন ---
        $tempPath = $data['thumbnail'] ?? null;

        if ($tempPath)
        {
            // ১. config ফাইল থেকে থাম্বনেইলের জন্য ডাইমেনশন নিন
            [$width, $height] = $this->getDimensionsForType('thumbnail');

            // ২. Trait-এর মেথড কল করে ছবিটি প্রসেস এবং সেভ করুন
            $finalPath = $this->processAndSaveImage(
                $tempPath,
                "property/{$propertyId}", // Base Folder
                'thumbnail',                // Sub Folder
                $width,
                $height
            );

            // ৩. ডেটা অ্যারেতে চূড়ান্ত পাথটি সেট করুন
            $data['thumbnail'] = $finalPath;
        }

        return $data;
    }
}
