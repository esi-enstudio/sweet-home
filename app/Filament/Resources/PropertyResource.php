<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Filament\Resources\PropertyResource\RelationManagers\AmenitiesRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\FloorPlansRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\MediaRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\MessagesRelationManager;
use App\Filament\Resources\PropertyResource\RelationManagers\SpaceOverviewsRelationManager;
use App\Models\District;
use App\Models\Property;
use App\Models\Union;
use App\Models\Upazila;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
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
                // প্রধান কলাম (2/3 অংশ)
                Group::make()
                    ->schema([
                        // --- Basic Information Section ---
                        Section::make('Basic Information')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('একটি সংক্ষিপ্ত, আকর্ষণীয় ভূমিকা লিখুন যা বাসার সেরা বৈশিষ্ট্যগুলো তুলে ধরে। উদাহরণ: “ভৈরবের কেন্দ্রস্থলে আধুনিক ৩ বেডরুমের ফ্ল্যাট।”')
                                    ->columnSpanFull(),

                                TextInput::make('property_id')
                                    ->label('Property ID')
                                    ->visibleOn(['edit']) // ব্যবহারকারী এটি পরিবর্তন করতে পারবে না
                                    ->placeholder('Will be generated automatically')
                                    ->helperText('এটি লোকেশনের উপর ভিত্তি করে স্বয়ংক্রিয়ভাবে তৈরি হবে।'),

                                RichEditor::make('description')
                                    ->columnSpanFull()
                                    ->helperText('বাসার পরিবেশ, সুযোগ-সুবিধা এবং অন্যান্য গুরুত্বপূর্ণ তথ্য বিস্তারিতভাবে লিখুন।')
                                    ->nullable(),
                            ])->columns(2),

                        // --- Location Section ---
                        Section::make('Location Details')
                            ->schema([
                                Select::make('division_id')
                                    ->required()
                                    ->relationship('division', 'bn_name')
                                    ->helperText('প্রপার্টিটি কোন বিভাগে অবস্থিত তা নির্বাচন করুন।')
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set) => $set('district_id', null)),

                                Select::make('district_id')
                                    ->required()
                                    ->helperText('প্রপার্টিটি কোন জেলায় অবস্থিত তা নির্বাচন করুন।')
                                    ->options(fn (Get $get): Collection => District::query()
                                        ->where('division_id', $get('division_id'))
                                        ->pluck('bn_name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set) => $set('upazila_id', null)),

                                Select::make('upazila_id')
                                    ->required()
                                    ->helperText('প্রপার্টিটি কোন উপজেলায় অবস্থিত তা নির্বাচন করুন।')
                                    ->options(fn (Get $get): Collection => Upazila::query()
                                        ->where('district_id', $get('district_id'))
                                        ->pluck('bn_name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set) => $set('union_id', null)),

                                Select::make('union_id')
                                    ->helperText('প্রপার্টিটি কোন ইউনিয়নে অবস্থিত তা নির্বাচন করুন (যদি থাকে)।')
                                    ->options(fn (Get $get): Collection => Union::query()
                                        ->where('upazila_id', $get('upazila_id'))
                                        ->pluck('bn_name', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),

                                TextInput::make('landmark')
                                    ->helperText('কাছাকাছি কোনো পরিচিত স্থান বা রাস্তার নাম লিখুন, যেমন- "আনোয়ারা হাস্পাতালের বিপরীত পাশে"।')
                                    ->required(),

                                Textarea::make('address')
                                    ->label('Full Address')
                                    ->helperText('বাসা/হোল্ডিং নম্বর, রোড নম্বর, এলাকার নাম সহ সম্পূর্ণ ঠিকানা লিখুন।')
                                    ->required(),

                                TextInput::make('latitude')
                                    ->label('Latitude (অক্ষাংশ)')
                                    ->helperText('যেমন: 23.77701234')
                                    ->nullable()
                                    // ডেটাবেসে পাঠানোর আগে ফরম্যাট করা
                                    ->dehydrateStateUsing(fn (?string $state): ?string => $state ? rtrim(rtrim($state, '0'), '.') : null)
                                    ->rule('regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'), // অক্ষাংশের জন্য ভ্যালিডেশন

                                TextInput::make('longitude')
                                    ->label('Longitude (দ্রাঘিমাংশ)')
                                    ->helperText('যেমন: 90.39945100')
                                    ->nullable()
                                    // ডেটাবেসে পাঠানোর আগে ফরম্যাট করা
                                    ->dehydrateStateUsing(fn (?string $state): ?string => $state ? rtrim(rtrim($state, '0'), '.') : null)
                                    ->rule('regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'), // দ্রাঘিমাংশের জন্য ভ্যালিডাউনলোড

                            ])->columns(2),

                        // --- Rent & Cost Section ---
                        Section::make('Rent & Costs')
                            ->schema([
                                TextInput::make('rent_amount')
                                    ->helperText('শুধুমাত্র সংখ্যা লিখুন, যেমন- 25000।')
                                    ->numeric()
                                    ->required()
                                    ->prefix('BDT')
                                    ->nullable(),

                                TextInput::make('service_charge')
                                    ->helperText('লিফট, জেনারেটর, নিরাপত্তা ইত্যাদি সহ মাসিক সার্ভিস চার্জ উল্লেখ করুন। (যদি থাকে)')
                                    ->numeric()
                                    ->prefix('BDT')
                                    ->nullable(),

                                TextInput::make('security_deposit')
                                    ->helperText('ভাড়াটিয়াকে শুরুতে কত টাকা অগ্রিম বা জামানত হিসেবে দিতে হবে তা লিখুন। (যদি থাকে)')
                                    ->numeric()
                                    ->prefix('BDT')
                                    ->nullable(),

                                Select::make('rent_negotiable')
                                    ->helperText('ভাড়া নিয়ে আলোচনার সুযোগ আছে কি না তা নির্বাচন করুন।')
                                    ->options(['negotiable' => 'Negotiable', 'fixed' => 'Fixed'])
                                    ->default('negotiable'),

                                Textarea::make('rent_summary')
                                    ->label('Rent Summary (e.g., what is included)')
                                    ->helperText('ভাড়ার সাথে কী কী বিল অন্তর্ভুক্ত আছে (যেমন- গ্যাস, পানি), তা এখানে সংক্ষেপে লিখুন। (যদি থাকে)')
                                    ->nullable()
                                    ->columnSpanFull(),
                            ])->columns(2),

                        // --- Rules & Contact Section ---
                        Section::make('Rules & Contact')
                            ->schema([
                                TextInput::make('contact_number_primary')
                                    ->helperText('গ্রাহকরা এই নম্বরে সরাসরি যোগাযোগ করবে।')
                                    ->minLength(11)
                                    ->maxLength(11)
                                    ->tel()
                                    ->required(),

                                TextInput::make('contact_whatsapp')
                                    ->tel()
                                    ->minLength(11)
                                    ->maxLength(11)
                                    ->helperText('হোয়াটসঅ্যাপে যোগাযোগের জন্য নম্বরটি দিন। (যদি থাকে)')
                                    ->nullable(),

                                RichEditor::make('house_rules')
                                    ->nullable()
                                    ->helperText('ভাড়াটিয়াদের জন্য কোনো বিশেষ নিয়ম (যেমন- রাত ১১টার পর গেট বন্ধ) থাকলে তা এখানে লিখুন। (যদি থাকে)')
                                    ->columnSpanFull(),
                            ])->columns(2),

                    ])->columnSpan(['lg' => 2]),

                // সাইডবার কলাম (1/3 অংশ)
                Group::make()
                    ->schema([
                        // --- Status & Association Section ---
                        Section::make('Status & Association')
                            ->schema([
                                Select::make('status')
                                    ->visibleOn(['edit'])
                                    ->options(['pending' => 'Pending', 'active' => 'Active', 'inactive' => 'Inactive'])
                                    ->default('pending'),

                                Toggle::make('is_available')
                                    ->label('Available for Rent/Sell')
                                    ->helperText('এটি চালু থাকলে প্রপার্টিটি ভাড়া/বিক্রির জন্য ওয়েবসাইটে দেখানো হবে।')
                                    ->required()
                                    ->default(true),

                                Toggle::make('is_featured')
                                    ->label('Featured Property')
                                    ->helperText('এটি চালু করলে প্রপার্টিটি হোমপেজ বা বিশেষ সেকশনে দেখানো হবে।'),

                                DatePicker::make('available_from')
                                    ->required()
                                    ->helperText('কোন তারিখ থেকে প্রপার্টিটি ভাড়া বা বিক্রির জন্য প্রস্তুত হবে তা নির্বাচন করুন।')
                                    ->default(now()),
                            ]),

                        // --- Property Type & Layout ---
                        Section::make('Type & Layout')
                            ->schema([
                                Select::make('listing_type')
                                    ->options(['rent' => 'For Rent', 'sell' => 'For Sell', 'buy' => 'For Buy'])
                                    ->helperText('প্রপার্টিটি কি ভাড়া, বিক্রি নাকি কেনার জন্য পোস্ট করা হচ্ছে? তা নির্বাচন করুন।')
                                    ->required(),

                                Select::make('property_type_id')
                                    ->relationship('propertyType', 'name')
                                    ->helperText('এটি কি ফ্ল্যাট, ডুপ্লেক্স নাকি অন্য কোনো ধরনের প্রপার্টি? তা নির্বাচন করুন।')
                                    ->label('Property Type')
                                    ->required(),

                                Select::make('tenant_id')
                                    ->relationship('tenants', 'name')
                                    ->label('Primary Tenant Type')
                                    ->helperText('কোন ধরনের ভাড়াটিয়াকে অগ্রাধিকার দেওয়া হবে তা নির্বাচন করুন (যেমন- ফ্যামিলি, ব্যাচেলর)।')
                                    ->required(),

                                TextInput::make('total_area')
                                    ->label('Total Area (sq. ft.)')
                                    ->numeric()
                                    ->helperText('সম্পূর্ণ জায়গার পরিমাণ স্কয়ার ফিটে লিখুন।')
                                    ->required(),

                                TextInput::make('bedrooms')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->helperText('মোট বেডরুমের সংখ্যা লিখুন।'),

                                TextInput::make('bathrooms')
                                    ->numeric()
                                    ->required()
                                    ->helperText('মোট বাথরুমের সংখ্যা লিখুন।')
                                    ->default(1),

                                TextInput::make('balconies')
                                    ->numeric()
                                    ->required()
                                    ->helperText('মোট বারান্দার সংখ্যা লিখুন।')
                                    ->default(0),

                                Select::make('floor_number')
                                    ->options([
                                        'ground_floor' => 'নিচ তলা (Ground Floor)',
                                        '1st_floor' => '১ম তলা (1st Floor)',
                                        '2nd_floor' => '২য় তলা (2nd Floor)',
                                        '3rd_floor' => '৩য় তলা (3rd Floor)',
                                        '4th_floor' => '৪র্থ তলা (4th Floor)',
                                        '5th_floor' => '৫ম তলা (5th Floor)',
                                        '6th_floor' => '৬ষ্ঠ তলা (6th Floor)',
                                        '7th_floor' => '৭ম তলা (7th Floor)',
                                        '8th_floor' => '৮ম তলা (8th Floor)',
                                        '9th_floor' => '৯ম তলা (9th Floor)',
                                        '10th_floor' => '১০ম তলা (10th Floor)',
                                        '11th_floor' => '১১তম তলা (11th Floor)',
                                        '12th_floor' => '১২তম তলা (12th Floor)',
                                        '13th_floor' => '১৩তম তলা (13th Floor)',
                                        '14th_floor' => '১৪তম তলা (14th Floor)',
                                        '15th_floor' => '১৫তম তলা (15th Floor)',
                                        '16th_floor' => '১৬তম তলা (16th Floor)',
                                        '17th_floor' => '১৭তম তলা (17th Floor)',
                                        '18th_floor' => '১৮তম তলা (18th Floor)',
                                        '19th_floor' => '১৯তম তলা (19th Floor)',
                                        '20th_floor' => '২০তম তলা (20th Floor)',
                                        'top_floor' => 'টপ ফ্লোর (Top Floor)',
                                    ])
                                    ->searchable() // ব্যবহারকারীকে সার্চ করার সুবিধা দেবে
                                    ->placeholder('ফ্লোর নির্বাচন করুন')
                                    ->helperText('প্রপার্টিটি কত তলায় অবস্থিত তা নির্বাচন করুন।')
                                    ->nullable(),

                                Select::make('facing')
                                    ->options(['north'=>'North', 'south'=>'South', 'east'=>'East', 'west'=>'West'])
                                    ->helperText('বাসাটি কোন দিকে মুখ করে আছে (যেমন- দক্ষিণমুখী)।')
                                    ->nullable(),

                                TextInput::make('year_built')
                                    ->label('Year Built')
                                    ->nullable()
                                    ->helperText('প্রপার্টিটি কোন সালে তৈরি করা হয়েছে তা লিখুন।'),
                            ])->columns(1),

                        // --- Thumbnail Section ---
                        Section::make('Thumbnail')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->label('')
                                    ->image()
                                    ->helperText('বিজ্ঞাপনের প্রধান এবং সবচেয়ে আকর্ষণীয় ছবিটি এখানে আপলোড করুন।')
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
            MessagesRelationManager::class,
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
