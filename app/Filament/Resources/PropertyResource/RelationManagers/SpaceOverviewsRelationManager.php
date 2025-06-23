<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpaceOverviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'spaceOverviews';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Dimension (e.g., 20 x 16 sq feet)')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('length')
                            ->numeric()
                            ->suffix('ft')
                            ->placeholder(20)
                            ->nullable(),

                        Forms\Components\TextInput::make('width')
                            ->numeric()
                            ->suffix('ft')
                            ->placeholder(16)
                            ->nullable(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('pivot.length')->label('Length (ft)'),
                Tables\Columns\TextColumn::make('pivot.width')->label('Width (ft)'),
                Tables\Columns\TextColumn::make('pivot.total_sq_feet')->label('Total Area (sq. ft.)')->weight('bold'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // বিদ্যমান SpaceOverview যুক্ত করার জন্য
                Tables\Actions\AttachAction::make()
                    ->icon('heroicon-o-plus')
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect(),

                        Forms\Components\Fieldset::make('Dimension (e.g., 20 x 16 sq feet)')
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('length')
                                    ->numeric()
                                    ->suffix('ft')
                                    ->placeholder(20)
                                    ->nullable(),

                                Forms\Components\TextInput::make('width')
                                    ->numeric()
                                    ->suffix('ft')
                                    ->placeholder(16)
                                    ->nullable(),
                            ]),

                    ])
                    ->preloadRecordSelect()

                    // --- এখানে স্বয়ংক্রিয় গণনা করা হচ্ছে ---
                    ->using(function (array $data, RelationManager $livewire) {
                        // স্বয়ংক্রিয় গণনা
                        if (isset($data['length']) && isset($data['width'])) {
                            $data['total_sq_feet'] = (float)$data['length'] * (float)$data['width'];
                        }

                        // getRelationship() দিয়ে রিলেশনশিপ অবজেক্টটি পাওয়া যায়
                        // এবং attach() মেথড কল করে ডেটা সেভ করা হয়
                        $livewire->getRelationship()->attach($data['recordId'], [
                            'length' => $data['length'] ?? null,
                            'width' => $data['width'] ?? null,
                            'total_sq_feet' => $data['total_sq_feet'] ?? null,
                        ]);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalHeading('Edit Living Room Dimension\'s'),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
