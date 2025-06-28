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
use Carbon\Carbon;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
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
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    protected static ?int $navigationSort = 2;

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
                                    ->unique(ignoreRecord: true)
                                    ->required(),

                                TextInput::make('contact_whatsapp')
                                    ->tel()
                                    ->unique(ignoreRecord: true)
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
                                Placeholder::make('property_id')
                                    ->label('')
                                    ->content(fn(?Model $record) => 'ID: ' . $record->property_id),

                                Select::make('status')
                                    ->visibleOn(['edit'])
                                    ->options(['pending' => 'Pending', 'approved' => 'Approve', 'rejected' => 'Reject'])
                                    ->default('pending'),

                                Toggle::make('is_spotlight')
                                    ->label('Spotlight Property')
                                    ->helperText(''),

                                Toggle::make('is_featured_showcase')
                                    ->label('Featured Showcase Property')
                                    ->helperText(''),

                                Toggle::make('is_available')
                                    ->label('Available for Rent/Sell')
                                    ->helperText('এটি চালু থাকলে প্রপার্টিটি ভাড়া/বিক্রির জন্য ওয়েবসাইটে দেখানো হবে।')
                                    ->required()
                                    ->default(true),

                                Toggle::make('is_featured')
                                    ->label('Featured in Lists')
                                    ->helperText('সাধারণ ফিচার্ড লিস্টে দেখানো হবে।'),

                                Toggle::make('is_hero_featured')
                                    ->label('Feature in Homepage Hero')
                                    ->helperText('হোমপেজের প্রধান স্লাইডারে দেখানো হবে।')
                                    ->reactive(), // অথবা live()

                                TextInput::make('hero_order_column')
                                    ->label('Hero Slider Order')
                                    ->numeric()
                                    ->helperText('স্লাইডারে প্রদর্শনের ক্রম (ছোট সংখ্যা আগে)।')
                                    // শুধুমাত্র is_hero_featured অন থাকলেই এই ফিল্ডটি দেখানো হবে
                                    ->visible(fn (Get $get) => $get('is_hero_featured')),

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
                                    ->imageEditor()
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
            ->contentGrid([
                'xl' => 2,
            ])
            ->columns([
                // Split কার্ডটিকে দুটি প্রধান অংশে ভাগ করবে: বামে ছবি, ডানে তথ্য
                Split::make([
                    // --- বাম অংশ: ছবি ---
                    ImageColumn::make('thumbnail')
                        ->width('150px')
                        ->height('170px')
                        ->extraImgAttributes(['class' => 'rounded-lg']),

                    // --- ডান অংশ: তথ্যের স্ট্যাক ---
                    Stack::make([
                        // উপরের অংশে টাইটেল এবং স্ট্যাটাস ব্যাজ
                        Grid::make(1)
                            ->schema([
                                TextColumn::make('title')
                                    ->weight(FontWeight::Bold)
                                    ->searchable()
                                    ->limit(30),
                            ]),

                        // মাঝের অংশে ঠিকানা
                        TextColumn::make('address')
                            ->color('gray')
                            ->limit(30),

                        // নিচের অংশে প্রধান ফিচারগুলো
                        Grid::make()
                            ->columns([
                                'lg' => 3,
                                'sm' => 3,
                            ])
                            ->schema([
                                TextColumn::make('bedrooms')
                                    ->suffix(' Bed')
                                    ->weight(FontWeight::Medium),

                                TextColumn::make('bathrooms')
                                    ->suffix(' Bath')
                                    ->weight(FontWeight::Medium),

                                TextColumn::make('total_area')
                                    ->weight(FontWeight::Medium)
                                    ->suffix(' sq.ft.'),
                            ]),

                        Grid::make([
                            'lg' => 2,
                        ])
                            ->schema([
                                IconColumn::make('status')
                                    ->color(fn (string $state): string => match ($state) {
                                        'approved' => 'success',
                                        'rejected' => 'danger',
                                        'pending' => 'warning',
                                        default => 'gray',
                                    })
                                    ->icon(fn(string $state): string => match ($state){
                                    'approved' => 'heroicon-o-check-circle',
                                    'pending' => 'heroicon-o-pause-circle',
                                    'rejected' => 'heroicon-o-x-circle',
                                }),
                                TextColumn::make('rent_amount')->label('Rent')->money('BDT')->weight(FontWeight::SemiBold),
                        ]),
                    ])->space(2), // স্ট্যাকের আইটেমগুলোর মধ্যে স্পেস
                ])
                    ->from('md')->extraAttributes(['class' => 'mb-5']), // মিডিয়াম স্ক্রিন থেকে Split লেআউট শুরু হবে

                // Panel প্রতিটি প্রপার্টিকে একটি আলাদা কার্ড হিসেবে দেখাবে
//                Panel::make([
//                    Grid::make()
//                        ->schema([
//                            Stack::make([
//                                TextColumn::make('propertyType.name')
//                                    ->label('Type')
//                                    ->grow(false)
//                                    ->icon('heroicon-o-tag'),
//
//                                TextColumn::make('listing_type')
//                                    ->label('Listing For')
//                                    ->grow(false)
//                                    ->icon('heroicon-o-receipt-percent')
//                                    ->formatStateUsing(fn($state) => Str::title($state))
//                                    ->badge(),
//
//                                TextColumn::make('created_at')
//                                    ->label('Listed On')
//                                    ->grow(false)
//                                    ->since(),
//                            ])->space(1),
//                        ]),
//                ])->collapsed(),
            ])
            ->defaultPaginationPageOption(5)
            ->deferLoading()
            ->filters([
                Tables\Filters\SelectFilter::make('district')
                    ->relationship('district', 'bn_name'),
                Tables\Filters\TernaryFilter::make('is_available')->label('Available'),
                Tables\Filters\TernaryFilter::make('is_hero_featured')->label('Hero Property'),
                Tables\Filters\TernaryFilter::make('is_spotlight')->label('Spotlight Property'),
                Tables\Filters\TernaryFilter::make('is_featured_showcase')->label('Showcase Property'),
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
            'view' => Pages\ViewProperty::route('/{record}'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
