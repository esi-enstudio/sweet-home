<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // user_id ফিল্ডটি স্বয়ংক্রিয়ভাবে সেট হবে
                Forms\Components\Hidden::make('user_id')->default(Auth::id()),
                Forms\Components\TextInput::make('client_designation')
                    ->label('Designation')
                    ->required(),

                Forms\Components\Textarea::make('feedback_text')
                    ->required()
                    ->live()
                    ->maxLength(312) // Set the maximum character limit
                    ->hint(fn ($state, $component) => strlen($state) . '/' . $component->getMaxLength())
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_published')->default(false),
                Forms\Components\TextInput::make('order_column')->numeric()->default(0),
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
                Tables\Columns\ToggleColumn::make('is_published'),
            ])
            ->reorderable('order_column')
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
                    ->url(route('filament.admin.resources.testimonials.create'))
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
}
