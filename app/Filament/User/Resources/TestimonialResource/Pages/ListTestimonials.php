<?php

namespace App\Filament\User\Resources\TestimonialResource\Pages;

use App\Filament\User\Resources\TestimonialResource;
use App\Models\Testimonial;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimonials extends ListRecords
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        // চেক করুন বর্তমান ব্যবহারকারী আগে টেস্টিমোনিয়াল দিয়েছে কি না
        $hasTestimonial = Testimonial::where('user_id', auth()->id())->exists();

        // যদি অ্যাডমিন হয় অথবা কোনো টেস্টিমোনিয়াল না দিয়ে থাকে, তাহলেই Create বাটন দেখাও
        if (!$hasTestimonial) {
            return [
                Actions\CreateAction::make()
                    ->icon('heroicon-o-plus')
                    ->label('Add New'),
            ];
        }

        // অন্যথায়, কোনো বাটন দেখানোর দরকার নেই
        return [];
    }
}
