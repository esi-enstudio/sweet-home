<?php

namespace App\Filament\User\Resources\TestimonialResource\Pages;

use App\Filament\User\Resources\TestimonialResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonial extends CreateRecord
{
    protected static string $resource = TestimonialResource::class;
    protected static bool $canCreateAnother = false;
}
