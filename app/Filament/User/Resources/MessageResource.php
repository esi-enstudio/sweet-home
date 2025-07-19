<?php

namespace App\Filament\User\Resources;

use App\Filament\Resources\PropertyResource;
use App\Filament\User\Resources\MessageResource\Pages;
use App\Filament\User\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use App\Models\Property;
use App\Traits\MarksAsRead;
use Carbon\Carbon;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class MessageResource extends Resource
{
    use MarksAsRead;

    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property.property_id')
                    ->searchable()->sortable()
                    ->url(fn ($record) => PropertyResource::getUrl('edit', ['record' => $record->property])),
                Tables\Columns\TextColumn::make('name')
                    ->label('Sender Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_read')->boolean(),
                Tables\Columns\TextColumn::make('read_at')
                    ->dateTime()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->diffForHumans())
                    ->description(fn($state) => Carbon::parse($state)->toDayDateTimeString())
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Send at')
                    ->dateTime()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->diffForHumans())
                    ->description(fn($state) => Carbon::parse($state)->toDayDateTimeString())
                    ->sortable(),
            ])
            ->defaultPaginationPageOption(5)
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->mutateRecordDataUsing(function (Model $record) {
                        // আমাদের Trait-এর markAsRead মেথডটি কল করুন
                        static::markAsRead($record);

                        // মূল রেকর্ড ডেটা রিটার্ন করুন
                        return $record->toArray();
                    }),
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
                Infolists\Components\Fieldset::make('Sender Info')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\TextEntry::make('name'),

                            Infolists\Components\TextEntry::make('phone')
                                ->label('Phone Number'),
                        ])
                    ]),

                Infolists\Components\Fieldset::make('Message')
                    ->schema([
                        Infolists\Components\TextEntry::make('message')
                            ->label('')
                            ->columnSpanFull(),
                    ]),
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
            'index' => Pages\ListMessages::route('/'),
//            'create' => Pages\CreateMessage::route('/create'),
//            'view' => Pages\ViewMessage::route('/{record}'),
//            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $propertiesId = Property::query()
            ->where('user_id', Auth::id())->pluck('id');

        return parent::getEloquentQuery()->whereIn('property_id', $propertiesId);
    }

    public static function getNavigationBadge(): ?string
    {
        $propertiesId = Property::query()
            ->where('user_id', Auth::id())->pluck('id');

        return static::getModel()::whereIn('property_id', $propertiesId)->where('is_read', false)->count();
    }
}
