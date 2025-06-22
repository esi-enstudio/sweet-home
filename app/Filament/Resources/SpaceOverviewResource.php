<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpaceOverviewResource\Pages;
use App\Filament\Resources\SpaceOverviewResource\RelationManagers;
use App\Models\SpaceOverview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpaceOverviewResource extends Resource
{
    protected static ?string $model = SpaceOverview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Name and Class')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('icon_class')
                            ->maxLength(100),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('icon_class'),
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
                    ->url(route('filament.admin.resources.space-overviews.create'))
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
            'index' => Pages\ListSpaceOverviews::route('/'),
            'create' => Pages\CreateSpaceOverview::route('/create'),
            'edit' => Pages\EditSpaceOverview::route('/{record}/edit'),
        ];
    }
}
