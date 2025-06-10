<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Property Details')
                        ->columns(2)
                        ->schema([
                            Section::make('Primary Information')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('title')
                                        ->helperText('একটি সংক্ষিপ্ত, আকর্ষণীয় ভূমিকা লিখুন যা বাসার সেরা বৈশিষ্ট্যগুলো তুলে ধরে। উদাহরণ: “বাস স্ট্যান্ড এ আধুনিক ৩ বেডরুমের ফ্ল্যাট, আলো-বাতাসপূর্ণ, ছোট পরিবারের জন্য আদর্শ।”')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('address')
                                        ->helperText('এলাকার নাম, রাস্তা(যেমন: বঙ্গবন্ধু সরণি রোড, ভৈরব বাজার, ভৈরব, কিশোরগঞ্জ)।')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('landmark')
                                        ->helperText('কাছাকাছি সুপরিচিত স্থান বা ল্যান্ডমার্ক (যেমন: “আনয়ারা হাসপাতালের বিপরীত পাশে”)')
                                        ->maxLength(255),

                                    TextInput::make('environment')
                                        ->helperText('এলাকাটি কি শান্ত, পারিবারিক, ব্যস্ত, নিরাপদ? (যেমন: পারিবারিক পরিবেশ, নিরাপদ আবাসিক এলাকা)')
                                        ->maxLength(255),
                                ]),

                            Section::make('Google Maps Data')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('latitude')
                                        ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ  24.321456')
                                        ->step('any')
                                        ->numeric(),

                                    TextInput::make('longitude')
                                        ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ 90.369852')
                                        ->step('any')
                                        ->numeric(),
                                ]),

                            Section::make('Property Specifications')
                                ->columns(2)
                                ->schema([
                                    Select::make('area_type')
                                        ->helperText('শহুরে (উচ্চ-ঘনত্ব), আধা-শহুরে, বা গ্রামীণ এলাকা')
                                        ->options([
                                            'urban' => 'Urban',
                                            'semi_urban' => 'Semi Urban',
                                            'rural' => 'Rural',
                                        ]),

                                    Select::make('property_type')
                                        ->helperText('টিনশেড, আধা-পাকা, ফ্ল্যাট, ডুপ্লেক্স')
                                        ->options([
                                            'tin_shed' => 'Tin Shed',
                                            'semi_pucca' => 'Semi Pucca',
                                            'flat' => 'Flat',
                                            'duplex' => 'Duplex',
                                        ]),

                                    Select::make('tenant_type')
                                        ->helperText('ছোট পরিবার, বড় পরিবার, ব্যাচেলর, সাবলেট')
                                        ->options([
                                            'small_family' => 'Small Family',
                                            'large_family' => 'Large Family',
                                            'bachelor' => 'Bachelor',
                                            'sublet' => 'Sublet',
                                        ]),

                                    TextInput::make('total_area')
                                        ->helperText('বর্গফুট বা বর্গমিটারে বাসার মোট আকার (যেমন: ১২০০ বর্গফুট)।')
                                        ->numeric(),
                                ]),

                            Section::make('Rooms & Spaces')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('bedrooms')
                                        ->numeric(),

                                    TextInput::make('bathrooms')
                                        ->numeric(),

                                    TextInput::make('dining_rooms')
                                        ->numeric(),

                                    TextInput::make('living_rooms')
                                        ->numeric(),

                                    TextInput::make('study_rooms')
                                        ->numeric(),

                                    TextInput::make('store_rooms')
                                        ->numeric(),

                                    TextInput::make('balconies')
                                        ->numeric(),
                                ]),

                            Section::make('Finishing & Condition')
                                ->columns(2)
                                ->schema([
                                    Select::make('floor_number')
                                        ->multiple()
                                        ->preload()
                                        ->options([
                                            'ground' => 'Ground Floor',
                                            '1st' => '1st Floor',
                                            '2nd' => '2nd Floor',
                                            '3rd' => '3rd Floor',
                                            '4th' => '4th Floor',
                                            '5th' => '5th Floor',
                                            '6th' => '6th Floor',
                                            '7th' => '7th Floor',
                                            '8th' => '8th Floor',
                                            '9th' => '9th Floor',
                                            '10th' => '10th Floor',
                                            '11th' => '11th Floor',
                                            '12th' => '12th Floor',
                                            '13th' => '13th Floor',
                                            '14th' => '14th Floor',
                                            '15th' => '15th Floor',
                                            '16th' => '16th Floor',
                                            '17th' => '17th Floor',
                                            '18th' => '18th Floor',
                                            '19th' => '19th Floor',
                                            '20th' => '20th Floor',
                                        ]),

                                    Select::make('flooring')
                                        ->options([
                                            'tiles' => 'Tiles',
                                            'marble' => 'Marble',
                                            'wood' => 'Wood',
                                            'cement' => 'Cement',
                                        ]),

                                    Select::make('walls')
                                        ->options([
                                            'plaster' => 'Plaster',
                                            'paint' => 'Paint',
                                            'wallpaper' => 'Wallpaper',
                                        ]),

                                    Select::make('windows')
                                        ->options([
                                            'aluminum' => 'Aluminum',
                                            'glass' => 'Glass',
                                            'wood' => 'Wood',
                                            'iron' => 'Iron',
                                        ]),

                                    Select::make('condition')
                                        ->options([
                                            'new' => 'New',
                                            'old' => 'Old',
                                        ]),

                                    Select::make('facing')
                                        ->options([
                                            'north' => 'North',
                                            'south' => 'South',
                                            'east' => 'East',
                                            'west' => 'West',
                                        ]),
                                ]),


                            DatePicker::make('available_from')
                                ->native(false),

                            Select::make('is_urgent')
                                ->options([
                                    'true' => 'Yes',
                                    'false' => 'No',
                                ]),

                            Select::make('listing_type')
                                ->options([
                                    'rent' => 'Rent',
                                    'buy' => 'Buy',
                                    'sell' => 'Sell',
                                ]),

                            FileUpload::make('floor_plan')
                                ->disk('public')
                                ->directory('properties/floor-plan'),
                        ]),

                    Wizard\Step::make('Amenities')
                        ->columns(2)
                        ->schema([
                            Section::make('Location & Surroundings')
                                ->columns(2)
                                ->schema([
                                    TagsInput::make('nearby_facilities'),
                                    TagsInput::make('natural_environments'),
                                ]),

                            Section::make('Utility & Infrastructure')
                                ->columns(2)
                                ->schema([
                                    Select::make('gas_connection')
                                        ->options([
                                            'cylinder' => 'Cylinder',
                                            'pipeline' => 'Pipeline',
                                        ]),
                                    Select::make('kitchen_type')
                                        ->options([
                                            'general' => 'General',
                                            'cabinet' => 'Cabinet',
                                        ]),
                                    Select::make('electricity_type')
                                        ->default('postpaid')
                                        ->options([
                                            'prepaid' => 'Prepaid',
                                            'postpaid' => 'Postpaid',
                                        ]),
                                    TagsInput::make('water_quality'),
                                    TextInput::make('water_tank')->numeric(),
                                    TagsInput::make('backup_power')->columnSpanFull(),
                                ]),

                            Section::make('Building Facilities')
                                ->schema([
                                    Checkbox::make('has_lift')->label('Lift'),
                                    Checkbox::make('has_parking')->label('Parking'),
                                    Checkbox::make('has_roof_access')->label('Roof access'),
                                ]),

                            Section::make('Security & Monitoring')
                                ->schema([
                                    Checkbox::make('has_cctv')->label('CCTV'),
                                    Checkbox::make('has_security_guard')->label('Security guard'),
                                ]),

                            Section::make('Other')
                                ->schema([
                                    Checkbox::make('pets_allowed'),
                                ]),
                        ]),

                    Wizard\Step::make('Rent & Costs')
                        ->schema([
                            Section::make('Rent Details')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('monthly_rent')
                                        ->helperText('মাসিক ভাড়া')
                                        ->numeric(),
                                    TagsInput::make('rent_includes')
                                        ->helperText('ভাড়ার সাথে অন্তর্ভুক্ত (ইউটিলিটি বিল, সার্ভিস চার্জ)'),
                                    TextInput::make('rent_increase_possibility')
                                        ->helperText('ভাড়া বৃদ্ধির সম্ভাবনা'),
                                    Select::make('is_negotiable')
                                        ->helperText('দর-কষাকষি করা যাবে কিনা')
                                        ->options([
                                            'negotiable' => 'Negotiable',
                                            'fixed' => 'Fixed',
                                        ]),
                                ]),

                            Section::make('Bills')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('water_bill')
                                        ->helperText('পানির বিল কত রাখতে চান')
                                        ->numeric(),
                                    TextInput::make('gas_bill')
                                        ->helperText('গ্যাস বিল কত রাখতে চান')
                                        ->numeric(),
                                    TextInput::make('electricity_bill')
                                        ->helperText('বিদ্যুৎ বিল কত রাখতে চান')
                                        ->numeric(),
                                ]),

                            Section::make('Additional Charges')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('service_charge')
                                        ->helperText('সার্ভিস চার্জ কত রাখতে চান')
                                        ->numeric(),
                                    TextInput::make('lift_charge')
                                        ->helperText('লিফট চার্জ কত রাখতে চান')
                                        ->numeric(),
                                    TextInput::make('generator_charge')
                                        ->helperText('জেনারেটর চার্জ কত রাখতে চান')
                                        ->numeric(),
                                    TextInput::make('parking_fee')
                                        ->helperText('পার্কিং ফি (গাড়ি/বাইক) কত রাখতে চান')
                                        ->numeric(),
                                ]),

                            Section::make('Advance Payment')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('advance_rent_months')
                                        ->helperText('কত মাসের অগ্রিম ভাড়া চাচ্ছেন')
                                        ->maxLength(2)
                                        ->numeric(),
                                    Select::make('advance_payment_terms')
                                        ->helperText('অগ্রিম ভাড়া ফেরতযোগ্য কিনা')
                                        ->options([
                                            'refundable' => 'Refundable',
                                            'non-refundable' => 'Non Refundable',
                                        ]),
                                ]),
                        ]),

                    Wizard\Step::make('Rental Terms')
                        ->schema([
                            Section::make('Contract Terms')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('contract_duration')
                                        ->maxLength(255)
                                        ->helperText('উদাহরণ: "ন্যূনতম ১ বছরের চুক্তি প্রয়োজন"'),
                                    TextInput::make('contract_breach_terms')
                                        ->helperText('উদাহরণ: "চুক্তি ভঙ্গ করলে ডিপোজিট ফেরতযোগ্য নয়"'),
                                ]),

                            Section::make('Tenant Eligibility & Verification')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('tenant_eligibility')
                                        ->helperText('উদাহরণ: "সাবলেট দিতে পারবে, বাড়িওয়ালার অনুমতি সাপেক্ষে"'),
                                    TextInput::make('identity_verification')
                                        ->helperText('উদাহরণ: "পূর্ববর্তী বাড়িওয়ালার রেফারেন্স প্রয়োজন"'),
                                    TextInput::make('background_check')
                                        ->helperText('উদাহরণ: "পূর্ববর্তী বাড়িওয়ালার রেফারেন্স প্রয়োজন"'),
                                ]),

                            Section::make('Payment Terms')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('payment_schedule')
                                        ->helperText('উদাহরণ: "ভাড়া প্রতি মাসের ১-৭ তারিখের মধ্যে দিতে হবে"'),
                                    TextInput::make('payment_methods')
                                        ->helperText('উদাহরণ: "বিকাশ, নগদ, রকেট, ব্যাংক ট্রান্সফার, চেক, ক্যাশ"'),
                                ]),

                            Section::make('House Usage & Responsibilities')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('house_usage_rules')
                                        ->helperText('উদাহরণ: "দেয়ালে পেইন্টিং, ড্রিলিং বাড়িওয়ালার অনুমতি সাপেক্ষে"'),
                                    TextInput::make('maintenance_responsibility')
                                        ->helperText('উদাহরণ: "ছোট মেরামত ভাড়াটিয়ার, বড় মেরামত বাড়িওয়ালার"'),
                                    TextInput::make('damage_liability')
                                        ->helperText('উদাহরণ: "চুক্তি শেষে যৌথ পরিদর্শন। ক্ষতির জন্য ডিপোজিট থেকে কাটা হবে"'),
                                ]),
                        ]),

                    Wizard\Step::make('Contact Detail\'s')
                        ->columns(2)
                        ->schema([
                            TextInput::make('alternate_number')
                                ->numeric()
                                ->maxLength(11)
                                ->helperText(''),
                            TextInput::make('whatsapp_number')
                                ->numeric()
                                ->maxLength(11)
                                ->helperText(''),
                            TextInput::make('imo_number')
                                ->numeric()
                                ->maxLength(11)
                                ->helperText(''),
                        ]),

                    Wizard\Step::make('Media')
                        ->columns(2)
                        ->schema([
                            Select::make('media_type')
                                ->helperText('')
                                ->options([
                                    'photo' => 'Photo',
                                    'video' => 'Video',
                                    'virtual_tour' => 'Virtual Tour',
                                ]),
                            TextInput::make('caption')
                                ->helperText(''),
                            FileUpload::make('file_path')
                                ->disk('public')
                                ->directory('properties/images'),
                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_type'),
                Tables\Columns\TextColumn::make('property_type'),
                Tables\Columns\TextColumn::make('tenant_type'),
                Tables\Columns\TextColumn::make('total_area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dining_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('living_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('study_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('store_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('balconies')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('floor_plan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('floor_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('flooring'),
                Tables\Columns\TextColumn::make('walls'),
                Tables\Columns\TextColumn::make('windows'),
                Tables\Columns\TextColumn::make('condition'),
                Tables\Columns\TextColumn::make('facing'),
                Tables\Columns\TextColumn::make('available_from')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_urgent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('listing_type'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
