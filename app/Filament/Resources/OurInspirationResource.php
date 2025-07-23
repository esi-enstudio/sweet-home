<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurInspirationResource\Pages;
use App\Filament\Resources\OurInspirationResource\RelationManagers;
use App\Models\OurInspiration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\View\Components\Modal;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

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
                                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                    ->rules(['mimes:jpg,jpeg,png'])
                                    ->directory('temp-uploads'),
                            ]),
                        ]),
                ]),

                Forms\Components\Fieldset::make('Social Links')
                    ->schema([
                        Forms\Components\KeyValue::make('social_links')
                            ->label('Social Media Links')
                            ->keyLabel('Platform Name') // Key ফিল্ডের লেবেল
                            ->valueLabel('Profile URL') // Value ফিল্ডের লেবেল
                            ->reorderable()
                            ->addActionLabel('Add Social Link')
                            ->columnSpanFull()
                            ->helperText('Enter the social media platform name (e.g., facebook, twitter) and the full URL.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')->extraImgAttributes(['class' => 'rounded-lg']),
                Tables\Columns\TextColumn::make('name')
                    ->description(fn(Model $record) => Str::title($record->title)),

                ViewColumn::make('social_links')
                    ->label('Platforms')
                    // একটি ডেডিকেটেড Blade ভিউ ফাইল ব্যবহার করা হচ্ছে
                    ->view('tables.columns.social-links'),

                Tables\Columns\ToggleColumn::make('is_visible'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
