<?php

namespace App\Filament\Resources\OurInspirationResource\Pages;

use App\Filament\Resources\OurInspirationResource;
use App\Traits\ImageProcessingTrait;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurInspiration extends CreateRecord
{
    use ImageProcessingTrait;

    protected static string $resource = OurInspirationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $tempPath = $data['photo'] ?? null;

        if ($tempPath) {
            [$width, $height] = $this->getDimensionsForType('inspiration');

            // --- নতুন মেথড কল ---
            $finalPath = $this->processAndSaveImage(
                $tempPath,
                'our-inspiration', // Base Folder
                'photos',          // Sub Folder
                $width,
                $height
            );
            $data['photo'] = $finalPath;
        }
        return $data;
    }
}
