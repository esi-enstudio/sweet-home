<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use App\Traits\MarksAsRead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
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
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('phone')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\IconColumn::make('is_read')->boolean()->label('Read'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    // ভিউ করার আগে এই ফাংশনটি চলবে
                    ->mutateRecordDataUsing(function (Model $record) {
                        // রেকর্ডটিকে "read" হিসেবে মার্ক করুন
                        $this->markAsRead($record);

                        // মূল রেকর্ড ডেটা রিটার্ন করুন, কোনো পরিবর্তন ছাড়াই
                        return $record->toArray();
                    })
                    ->infolist([
                        Section::make('Message Details')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('phone'),
                                TextEntry::make('message')->columnSpanFull(),
                            ])->columns(2),
                    ]),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
