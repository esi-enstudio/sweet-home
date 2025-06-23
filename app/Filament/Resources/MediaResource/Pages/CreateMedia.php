<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    // এই ভ্যারিয়েবলটি আমাদের আপলোড করা ফাইল পাথগুলো সাময়িকভাবে ধরে রাখবে
    protected array $uploadedFilePaths = [];

    /**
     * ডেটা সেভ হওয়ার আগে এই মেথডটি কল হয়।
     * আমরা এখানে ফর্মের ডেটা পরিবর্তন করে নেব।
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // আপলোড করা ছবির পাথগুলো ($data['path']) একটি ক্লাস প্রোপার্টিতে সেভ করে রাখি
        $this->uploadedFilePaths = $data['path'];

        // মূল ডেটা অ্যারে থেকে 'path' কী-টি মুছে ফেলি, কারণ Media মডেলে সরাসরি অ্যারে সেভ করা যাবে না
        unset($data['path']);

        // পরিবর্তিত ডেটা রিটার্ন করি
        return $data;
    }

    /**
     * রেকর্ড তৈরি করার সম্পূর্ণ প্রক্রিয়াটি আমরা এখানে নিজেরা নিয়ন্ত্রণ করব।
     */
    protected function handleRecordCreation(array $data): Model
    {
        $createdRecords = [];

        // প্রতিটি আপলোড করা ফাইলের পাথের জন্য একটি করে Media রেকর্ড তৈরি করি
        foreach ($this->uploadedFilePaths as $path) {
            // mutateFormDataBeforeCreate থেকে পাওয়া মূল ডেটার সাথে path যোগ করি
            $recordData = array_merge($data, ['path' => $path]);

            // নতুন রেকর্ড তৈরি করি
            $createdRecords[] = static::getModel()::create($recordData);
        }

        // ফিলামেন্টকে জানানোর জন্য শেষ তৈরি হওয়া রেকর্ডটি রিটার্ন করি
        return last($createdRecords);
    }

    /**
     * সফলভাবে তৈরি হওয়ার পর কোথায় রিডাইরেক্ট হবে।
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
