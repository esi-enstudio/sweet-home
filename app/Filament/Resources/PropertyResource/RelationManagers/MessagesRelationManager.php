<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use App\Traits\MarksAsRead;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesRelationManager extends RelationManager
{
    use MarksAsRead;

    protected static string $relationship = 'messages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('property_id')
                    ->relationship('property', 'title'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\Textarea::make('message')->columnSpanFull(),
                Forms\Components\Toggle::make('is_read')->label('Mark as Read'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('phone')
            ->modifyQueryUsing(fn(Builder $query) => $query->with('user')->orderBy('messages.is_read', 'asc'))
            ->columns([
                ViewColumn::make('is_guest')
                    ->label('Sender Type') // কলামের লেবেল পরিবর্তন
                    ->view('tables.columns.message-sender'), // কাস্টম Blade ভিউ
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\IconColumn::make('is_read')->boolean()->label('Read'),
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
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('View message from')
                    // ভিউ করার আগে এই ফাংশনটি চলবে
                    ->mutateRecordDataUsing(function (Model $record) {
                        // রেকর্ডটিকে "read" হিসেবে মার্ক করুন
                        static::markAsRead($record);

                        // মূল রেকর্ড ডেটা রিটার্ন করুন, কোনো পরিবর্তন ছাড়াই
                        return $record->toArray();
                    })
                    ->infolist([
                        Fieldset::make('Sender Info')
                            ->schema([
                                Split::make([
                                    TextEntry::make('name'),

                                    TextEntry::make('phone')
                                        ->label('Phone Number'),
                                ])
                            ]),

                        Fieldset::make('Message')
                            ->schema([
                                TextEntry::make('message')
                                    ->label('')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
