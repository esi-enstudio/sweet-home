<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactNumberResource\Pages;
use App\Filament\Resources\ContactNumberResource\RelationManagers;
use App\Models\ContactNumber;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactNumberResource extends Resource
{
    protected static ?string $model = ContactNumber::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'My Properties';

    protected static ?string $navigationLabel = 'Contact Detail\'s';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Property Selection')
                    ->description('Select the specific property this contact information is related to.')
                    ->collapsible()
                    ->schema([
                        Select::make('property_id')
                            ->label('Select Property')
                            ->required()
                            ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),
                    ]),

                Section::make('Alternative Contact Information')
                    ->description('Provide additional phone numbers to ensure reliable communication options.')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('alternate_number')
//                            ->label('বিকল্প মোবাইল নম্বর')
                            ->numeric()
                            ->maxLength(11)
                            ->minLength(11)
                            ->helperText('প্রয়োজনে যোগাযোগের জন্য একটি বিকল্প নম্বর দিন'),

                        TextInput::make('whatsapp_number')
//                            ->label('WhatsApp নম্বর')
                            ->numeric()
                            ->maxLength(11)
                            ->minLength(11)
                            ->helperText('যদি WhatsApp ব্যবহার করেন, সেই নম্বরটি লিখুন'),

                        TextInput::make('imo_number')
//                            ->label('IMO নম্বর')
                            ->numeric()
                            ->maxLength(11)
                            ->minLength(11)
                            ->helperText('যদি IMO অ্যাপ ব্যবহার করেন, সেই নম্বর দিন'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property.title')
                    ->limit(30)
                    ->tooltip(fn($state) => $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('alternate_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imo_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListContactNumbers::route('/'),
            'create' => Pages\CreateContactNumber::route('/create'),
            'edit' => Pages\EditContactNumber::route('/{record}/edit'),
        ];
    }
}
