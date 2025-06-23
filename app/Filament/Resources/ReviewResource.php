<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-bottom-center-text';

    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('property_id')
                    ->relationship('property', 'name') // Assuming property has a 'name'
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Textarea::make('comment')
                    ->columnSpanFull(),
                Radio::make('rating')
                    ->label('Rating')
                    ->options(self::getStarRatingOptions()) // Helper function
                    ->columns(5)
                    ->required()
                    ->extraAttributes(['class' => 'filament-rating-star-radio']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('property.name')->sortable()->searchable(),
                TextColumn::make('user.name')->sortable()->searchable(),
                ViewColumn::make('rating')->view('filament.tables.columns.rating-stars'), // Custom view
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create review')
                    ->url(route('filament.admin.resources.reviews.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('property.name'),
                TextEntry::make('user.name'),
                ViewEntry::make('rating')->view('filament.infolists.components.rating-stars-entry'),
                TextEntry::make('comment')->columnSpanFull(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }

    // Helper function from previous conversation
    protected static function getStarRatingOptions(): array
    {
        $options = [];
        $starIcon = Blade::render('<x-heroicon-s-star class="w-6 h-6" />');
        for ($i = 1; $i <= 5; $i++) {
            $options[$i] = new HtmlString($starIcon);
        }
        return $options;
    }
}
