<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Traits\ImageProcessingTrait;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    use ImageProcessingTrait;

    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // --- user_id স্বয়ংক্রিয়ভাবে সেট করুন ---
        $data['user_id'] = Auth::id();


        $tempPath = $data['featured_image'] ?? null;

        if ($tempPath) {
            // config ফাইল থেকে 'post_featured'-এর জন্য ডাইমেনশন নিন
            [$width, $height] = $this->getDimensionsForType('post_thumbnail');

            // Trait-এর মেথড কল করে ছবিটি প্রসেস এবং সেভ করুন
            $finalPath = $this->processAndSaveImage(
                $tempPath,
                'posts',       // Base Folder
                'featured',    // Sub Folder
                $width,
                $height
            );

            // ডেটা অ্যারেতে চূড়ান্ত পাথটি সেট করুন
            $data['featured_image'] = $finalPath;
        }

        return $data;
    }
}
