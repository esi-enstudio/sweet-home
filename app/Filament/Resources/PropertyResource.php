<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Filament\Resources\PropertyResource\RelationManagers\AmenitiesRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\FloorPlansRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\MediaRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\SpaceOverviewsRelationManager;
use App\Models\District;
use App\Models\Property;
use App\Models\Union;
use App\Models\Upazila;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    protected static ?string $navigationLabel = 'My Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // কলাম লেআউট: প্রধান কলাম (2/3 অংশ) এবং সাইডবার (1/3 অংশ)
                Group::make()
                    ->schema([
                        // --- Property Information Section ---
                        Fieldset::make('Property Information')
                            ->schema([
                                TextInput::make('title')
                                    ->required()->maxLength(255)->columnSpanFull(),
                                RichEditor::make('description')
                                    ->columnSpanFull()
                                    ->nullable(),
                            ])->columns(2),

                        // --- Location Section ---
                        Fieldset::make('Location Details')
                            ->schema([
                                Select::make('division_id')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->live()
                                    ->relationship('division', 'name')
                                    ->afterStateUpdated(fn (Set $set) => $set('district_id', null)),

                                Select::make('district_id')
                                    ->label('District')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->options(fn (Get $get): Collection => District::query()
                                        ->where('division_id', $get('division_id'))
                                        ->pluck('bn_name', 'id'))
                                    ->afterStateUpdated(fn (Set $set) => $set('upazila_id', null)),

                                Select::make('upazila_id')
                                    ->label('Upazila')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->options(fn (Get $get): Collection => Upazila::query()
                                        ->where('district_id', $get('district_id'))
                                        ->pluck('bn_name', 'id'))
                                    ->afterStateUpdated(fn (Set $set) => $set('union_id', null)),

                                Select::make('union_id')
                                    ->label('Union')
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->nullable()
                                    ->options(fn (Get $get): Collection => Union::query()
                                        ->where('upazila_id', $get('upazila_id'))
                                        ->pluck('bn_name', 'id')),

                                TextInput::make('area_name')->label('Area / Neighborhood'),
                                TextInput::make('landmark')->nullable(),
                                Textarea::make('full_address')->required()->columnSpanFull(),
                                TextInput::make('latitude')->numeric()->nullable(),
                                TextInput::make('longitude')->numeric()->nullable(),
                            ])->columns(2),

                        // --- Rules & Contact Section ---
                        Fieldset::make('Rules & Contact')
                            ->schema([
                                TextInput::make('contact_number_primary')->tel()->required(),
                                TextInput::make('contact_whatsapp')->tel()->nullable(),
                                RichEditor::make('house_rules')->nullable()->columnSpanFull(),
                            ])->columns(2),

                    ])->columnSpan(['lg' => 2]),

                // --- সাইডবার কলাম ---
                Group::make()
                    ->schema([
                        // --- Status & Visibility Section ---
                        Fieldset::make('Status')
                            ->columns(1)
                            ->schema([
                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('Owner / Lister')
                                    ->searchable()
                                    ->required()
                                    ->default(auth()->id()),
                                Toggle::make('is_available')->label('Available for Rent/Sell')->required()->default(true),
                                DatePicker::make('available_from')->required()->default(now()),
                            ]),

                        // --- Property Type & Layout ---
                        Fieldset::make('Type & Layout')
                            ->columns(1)
                            ->schema([
                                Select::make('listing_type')->options(['rent' => 'For Rent', 'sell' => 'For Sell'])->required(),
                                Select::make('property_type')->options(['flat' => 'Flat', 'room' => 'Room', 'duplex' => 'Duplex'])->required(),
                                Select::make('tenant_type')->options(['family' => 'Family', 'bachelor' => 'Bachelor', 'student' => 'Student'])->required(),
                                TextInput::make('total_area')->label('Total Area (sq. ft.)')->numeric()->required(),
                                TextInput::make('bedrooms')->numeric()->default(1),
                                TextInput::make('bathrooms')->numeric()->default(1),
                                TextInput::make('balconies')->numeric()->default(0),
                                TextInput::make('floor_number')->nullable(),
                                Select::make('facing')->options(['north'=>'North', 'south'=>'South', 'east'=>'East', 'west'=>'West'])->nullable(),
                            ]),

                        // --- Rent & Cost Section ---
                        Fieldset::make('Rent & Costs')
                            ->columns(1)
                            ->schema([
                                TextInput::make('rent_amount')->numeric()->prefix('BDT')->nullable(),
                                TextInput::make('service_charge')->numeric()->prefix('BDT')->nullable(),
                                TextInput::make('security_deposit')->numeric()->prefix('BDT')->nullable(),
                                Select::make('rent_negotiable')->options(['negotiable' => 'Negotiable', 'fixed' => 'Fixed'])->default('negotiable'),
                                Textarea::make('rent_summary')->label('Rent Summary (e.g., what is included)')->nullable()->columnSpanFull(),
                            ]),

                        // --- Cover Image Section ---
                        Fieldset::make('Thumbnail')
                            ->columns(1)
                            ->schema([
                                FileUpload::make('thumbnail') // Ensure column name is 'thumbnail' in DB
                                ->label('')
                                    ->image()
                                    ->directory('property/thumbnails'),
                            ]),

                    ])->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => static::getModel()::query()->with(['user'])
            )
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->label('Thumbnail'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->description(fn (Property $record): string => $record->area_name . ', ' . $record->district->name),
                Tables\Columns\TextColumn::make('user.name')->label('Owner')->sortable(),
                Tables\Columns\TextColumn::make('rent_amount')->money('BDT')->sortable(),
                Tables\Columns\IconColumn::make('is_available')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultPaginationPageOption(5)
            ->deferLoading()
            ->filters([
                Tables\Filters\SelectFilter::make('district')
                    ->relationship('district', 'name'),
                Tables\Filters\TernaryFilter::make('is_available'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
                    ->url(route('filament.admin.resources.properties.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AmenitiesRelationManager::class,
            MediaRelationManager::class,
            FloorPlansRelationManager::class,
            SpaceOverviewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
