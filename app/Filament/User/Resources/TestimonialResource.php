<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\TestimonialResource\Pages;
use App\Filament\User\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // user_id ফিল্ডটি স্বয়ংক্রিয়ভাবে সেট হবে
                Hidden::make('user_id')->default(Auth::id()),
                TextInput::make('client_designation')->label('Designation')->required(),
                Textarea::make('feedback_text')
                    ->required()
                    ->live()
                    ->maxLength(312) // Set the maximum character limit
                    ->hint(fn ($state, $component) => strlen($state) . '/' . $component->getMaxLength())
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // User রিলেশনশিপ থেকে ছবি ও নাম দেখানো হচ্ছে
                Tables\Columns\ImageColumn::make('user.avatar_url')->label('Image')->circular(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Client Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('client_designation')
                    ->searchable(),

                IconColumn::make('is_published')
                    ->icon(fn (string $state): string => match ($state) {
                        '0' => 'heroicon-o-clock',
                        '1' => 'heroicon-o-check-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Action::make('create')
                    ->label('Add New')
                    ->url(route('filament.user.resources.testimonials.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}
