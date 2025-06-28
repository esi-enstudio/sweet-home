<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FloorPlansRelationManager extends RelationManager
{
    protected static string $relationship = 'floorPlans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Floor Plan Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Floor Name (e.g., First Floor, Top Garden)')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image_path')
                            ->label('Floor Plan Image')
                            ->image()
                            ->imageEditor()
                            ->directory('property/floor-plans')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('description')
                            ->nullable()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('total_area')
                            ->numeric()
                            ->required()
                            ->suffix('sq. ft.'),

                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Plan'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_area')
                    ->suffix(' sq. ft.'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->icon('heroicon-o-plus')
                    ->label('Add New'),
            ])
            ->actions([
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
