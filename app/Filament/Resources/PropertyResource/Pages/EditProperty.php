<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Filament\Resources\PropertyResource\RelationManagers\MessagesRelationManager;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

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
     *
     * @param  array  $data The form data.
     * @return array The mutated form data.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
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
