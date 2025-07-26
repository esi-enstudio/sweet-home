<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Traits\ImageProcessingTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPost extends EditRecord
{
    use ImageProcessingTrait;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = $this->record->user_id;


        $oldPath = $this->record->featured_image;
        $newTempPath = $data['featured_image'] ?? null;

        // যদি একটি নতুন ছবি আপলোড করা হয়
        if ($newTempPath && $newTempPath !== $oldPath) {
            [$width, $height] = $this->getDimensionsForType('post_thumbnail');

            $finalPath = $this->processAndSaveImage($newTempPath, 'posts', 'featured', $width, $height);

            $data['featured_image'] = $finalPath;

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

        return $data;
    }
}
