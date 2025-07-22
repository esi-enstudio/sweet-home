<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Filament\Resources\PropertyResource\RelationManagers\MessagesRelationManager;
use App\Traits\ImageProcessingTrait;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class EditProperty extends EditRecord
{
    use ImageProcessingTrait;

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
        $oldPath = $this->record->thumbnail;
        $newTempPath = $data['thumbnail'] ?? null;

        // যদি একটি নতুন ছবি আপলোড করা হয়
        if ($newTempPath && $newTempPath !== $oldPath) {
            // কনফিগ থেকে ডাইমেনশন নিন
            [$width, $height] = $this->getDimensionsForType('thumbnail');

            // Trait ব্যবহার করে নতুন ছবিটি প্রসেস করুন
            $finalPath = $this->processAndSaveImage(
                $newTempPath,
                $this->record->property_id, 'thumbnail',
                $width,
                $height
            );

            $data['thumbnail'] = $finalPath;

            // পুরোনো ছবিটি ডিলিট করুন
            if ($finalPath && $oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // যদি বিদ্যমান ছবিটি মুছে ফেলা হয়
        if (is_null($newTempPath) && $oldPath) {
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
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
