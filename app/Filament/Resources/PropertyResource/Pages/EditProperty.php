<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Filament\Resources\PropertyResource\RelationManagers\MessagesRelationManager;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class EditProperty extends EditRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * ডেটাবেসে সেভ হওয়ার আগে ফর্মের ডেটা পরিবর্তন করার জন্য এই মেথডটি কল হয়।
     * মেথডের নাম পরিবর্তন করে mutateFormDataBeforeSave করা হয়েছে।
     *
     * @param  array  $data The form data.
     * @return array The mutated form data.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // --- ধাপ ক: চেক করুন থাম্বনেইল ফিল্ডটি পরিবর্তন হয়েছে কি না ---
        // $this->record হলো ডেটাবেসে থাকা পুরোনো Property ইনস্ট্যান্স
        // $data['thumbnail'] হলো ফর্ম থেকে আসা নতুন মান

        // isDirty() মেথডটি এখানে সরাসরি কাজ করে না, তাই আমরা পুরোনো এবং নতুন মান তুলনা করব।
        $oldThumbnailPath = $this->record->thumbnail;
        $newThumbnailPath = $data['thumbnail'] ?? null; // এটি একটি স্ট্রিং (পাথ) অথবা null হতে পারে

        // পরিস্থিতি ১: একটি নতুন ছবি আপলোড করা হয়েছে
        // নতুন পাথে 'temp-thumbnails' থাকবে, কারণ এটি এখনও অস্থায়ী
        if ($newThumbnailPath && str_starts_with($newThumbnailPath, 'temp-thumbnails'))
        {
            // --- নতুন ছবিটি প্রসেস এবং মুভ করুন ---
            try {
                $manager = new ImageManager(new Driver());
                $imageContent = Storage::disk('public')->get($newThumbnailPath);
                $image = $manager->read($imageContent)
                    ->resize(850, 650)
                    ->toJpeg(80);

                // চূড়ান্ত পাথ তৈরি করুন (বিদ্যমান property_id ব্যবহার করে)
                $propertyId = $this->record->property_id;
                $fileName = basename($newThumbnailPath);
                $finalPath = "property/{$propertyId}/thumbnail/{$fileName}";

                // নতুন ছবিটি সেভ করুন
                Storage::disk('public')->put($finalPath, (string) $image);

                // অস্থায়ী ফাইলটি ডিলিট করুন
                Storage::disk('public')->delete($newThumbnailPath);

                // ডেটা অ্যারেতে চূড়ান্ত পাথটি সেট করুন
                $data['thumbnail'] = $finalPath;

                // --- পুরোনো ছবিটি (যদি থাকে) ডিলিট করুন ---
                if ($oldThumbnailPath && Storage::disk('public')->exists($oldThumbnailPath)) {
                    Storage::disk('public')->delete($oldThumbnailPath);
                }
            }catch (\Throwable $e){
                Log::error('Thumbnail update processing failed: ' . $e->getMessage());
                // কোনো সমস্যা হলে পুরোনো পাথটিই রেখে দিন
                $data['thumbnail'] = $oldThumbnailPath;
            }
        }
        // পরিস্থিতি ২: বিদ্যমান ছবিটি মুছে ফেলা হয়েছে (কিন্তু নতুন কিছু আপলোড হয়নি)
        elseif (is_null($newThumbnailPath) && $oldThumbnailPath) {
            // পুরোনো ছবিটি সার্ভার থেকে ডিলিট করুন
            Storage::disk('public')->delete($oldThumbnailPath);
            // $data['thumbnail'] অলরেডি null, তাই কিছু করার নেই
        }


        // $this->record হলো আপডেটের আগের Property মডেলের ইনস্ট্যান্স
        if ($this->record->status === 'rejected') {
            // ফর্ম থেকে আসা ডেটা অ্যারের 'status' কী-এর মান পরিবর্তন করে দিচ্ছি
            $data['status'] = 'pending';
        }


        return $data; // পরিবর্তিত ডেটা অ্যারেটি রিটার্ন করতে হবে
    }

    /**
     * সফলভাবে সেভ হওয়ার পর কোথায় রিডাইরেক্ট হবে।
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
