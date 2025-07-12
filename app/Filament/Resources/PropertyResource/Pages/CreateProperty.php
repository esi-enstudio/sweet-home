<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
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
    protected static string $resource = PropertyResource::class;

    // Add these methods to automatically set the user_id
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // Set the logged-in user's ID

        // --- ধাপ ক: একটি ইউনিক property_id তৈরি করুন ---
        $propertyId = Str::upper(Str::random(12));
        $data['property_id'] = $propertyId;

        // --- ধাপ খ: ছবি প্রসেস এবং মুভ করুন ---
        $tempPath = $data['thumbnail'] ?? null;

        if ($tempPath && Storage::disk('public')->exists($tempPath))
        {
            // Intervention Image দিয়ে ছবিটি পড়ুন এবং রিসাইজ করুন
            try {
                $manager = new ImageManager(new Driver());

                // Storage থেকে ফাইলের কনটেন্ট পড়ুন
                $imageContent = Storage::disk('public')->get($tempPath);

                $image = $manager->read($imageContent)
                    ->resize(850, 650)
                    ->toJpeg(80);

                // নতুন, চূড়ান্ত পাথ তৈরি করুন
                $fileName = basename($tempPath);
                $finalPath = "property/{$propertyId}/thumbnail/{$fileName}";

                // রিসাইজ করা ছবিটি চূড়ান্ত জায়গায় সেভ করুন
                Storage::disk('public')->put($finalPath, (string) $image);

                // আসল অস্থায়ী ফাইলটি ডিলিট করে দিন
                Storage::disk('public')->delete($tempPath);

                // ডেটা অ্যারেতে thumbnail-এর মান হিসেবে চূড়ান্ত পাথটি সেট করুন
                $data['thumbnail'] = $finalPath;
            }catch (\Throwable $e){
                Log::error('Thumbnail processing failed during mutation: ' . $e->getMessage());
                // কোনো সমস্যা হলে thumbnail পাথটি null করে দিন
                $data['thumbnail'] = null;
            }
        }

        // চূড়ান্ত, পরিবর্তিত ডেটা অ্যারেটি রিটার্ন করুন
        return $data;
    }
}
