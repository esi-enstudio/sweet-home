<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurInspirationResource\Pages;
use App\Filament\Resources\OurInspirationResource\RelationManagers;
use App\Models\OurInspiration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class OurInspirationResource extends Resource
{
    protected static ?string $model = OurInspiration::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Fieldset::make('Member Details')
                        ->columns(1)
                        ->schema([
                            Forms\Components\Group::make([
                                Forms\Components\TextInput::make('name')->required(),
                                Forms\Components\TextInput::make('title')->label('Designation/Title')->required(),
                                Forms\Components\TextInput::make('order_column')->label('Order'),
                                Forms\Components\Toggle::make('is_visible')->default(true),
                            ]),
                        ]),
                ]),

                Forms\Components\Group::make([
                    Forms\Components\Fieldset::make('Photo')
                        ->columns(1)
                        ->schema([
                            Forms\Components\Group::make([
                                Forms\Components\FileUpload::make('photo')
                                    ->label('')
                                    ->image()
                                    ->disk('public')
                                    ->directory('property/our-inspiration/photos'),
                            ]),
                        ]),
                ]),



                Forms\Components\Fieldset::make('Social Links')
                    ->schema([
                        Forms\Components\Repeater::make('social_links')
                            ->label('')
                            ->addActionLabel('Add member')
                            ->addActionAlignment(Alignment::Start)
                            ->reorderableWithButtons()
                            ->collapsible()
                            ->cloneable()
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\Grid::make([
                                    'default' => 1,
                                    'sm' => 2,
                                    'md' => 3,
                                ])
                                    ->schema([
                                        Forms\Components\TextInput::make('platform')->required(),
                                        Forms\Components\TextInput::make('profile_url')->url()->required(),
                                        Forms\Components\TextInput::make('icon_class')->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
                    ->url(route('filament.admin.resources.our-inspirations.create'))
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
            'index' => Pages\ListOurInspirations::route('/'),
            'create' => Pages\CreateOurInspiration::route('/create'),
            'edit' => Pages\EditOurInspiration::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_visible', 1)->count();
    }
}
