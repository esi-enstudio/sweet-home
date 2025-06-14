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

    // Add these methods to automatically set the user_id
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // Set the logged-in user's ID
        return $data;
    }

    protected function mutateFormDataBeforeUpdate(array $data): array
    {
        $data['user_id'] = Auth::id(); // Set the logged-in user's ID
        return $data;
    }
}
