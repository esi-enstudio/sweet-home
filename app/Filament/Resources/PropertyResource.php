<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Carbon\Carbon;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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
                TextInput::make('title')
                    ->label('শিরোনাম')
                    ->helperText('একটি সংক্ষিপ্ত, আকর্ষণীয় ভূমিকা লিখুন যা বাসার সেরা বৈশিষ্ট্যগুলো তুলে ধরে। উদাহরণ: “বাস স্ট্যান্ড এ আধুনিক ৩ বেডরুমের ফ্ল্যাট, আলো-বাতাসপূর্ণ, ছোট পরিবারের জন্য আদর্শ।”')
                    ->maxLength(255),

                TextInput::make('address')
                    ->label('ঠিকানা')
                    ->helperText('এলাকার নাম, রাস্তা(যেমন: বঙ্গবন্ধু সরণি রোড, ভৈরব বাজার, ভৈরব, কিশোরগঞ্জ)।')
                    ->maxLength(255),

                TextInput::make('landmark')
                    ->label('সুপরিচিত স্থান')
                    ->helperText('কাছাকাছি সুপরিচিত স্থান (যেমন: “আনোয়ারা হাসপাতালের বিপরীত পাশে”)')
                    ->maxLength(255),

                TextInput::make('environment')
                    ->label('পরিবেশ')
                    ->helperText('এলাকাটি কি শান্ত, পারিবারিক, ব্যস্ত, নিরাপদ? (যেমন: পারিবারিক পরিবেশ, নিরাপদ আবাসিক এলাকা)')
                    ->maxLength(255),

                TextInput::make('latitude')
                    ->label('অক্ষাংশ (latitude)')
                    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ  24.321456')
                    ->numeric(),

                TextInput::make('longitude')
                    ->label('দ্রাঘিমাংশ (longitude)')
                    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ 90.369852')
                    ->numeric(),

                Select::make('area_type')
                    ->label('এলাকার ধরন')
                    ->helperText('শহুরে (উচ্চ-ঘনত্ব), আধা-শহুরে, বা গ্রামীণ এলাকা')
                    ->options([
                        'urban' => 'শহুরে',
                        'semi_urban' => 'আধা শহুরে',
                        'rural' => 'গ্রামীণ',
                    ]),

                Select::make('property_type')
                    ->label('বাসার ধরন')
                    ->helperText('টিনশেড, আধা-পাকা, ফ্ল্যাট, ডুপ্লেক্স')
                    ->options([
                        'tin_shed' => 'টিনশেড',
                        'semi_pucca' => 'আধা-পাকা',
                        'flat' => 'ফ্ল্যাট',
                        'duplex' => 'ডুপ্লেক্স',
                    ]),

                Select::make('tenant_type')
                    ->label('ভাড়াটিয়ার ধরন')
                    ->helperText('ছোট পরিবার, বড় পরিবার, ব্যাচেলর, সাবলেট')
                    ->options([
                        'small_family' => 'ছোট পরিবার',
                        'large_family' => 'বড় পরিবার',
                        'bachelor' => 'ব্যাচেলর',
                        'sublet' => 'সাবলেট',
                    ]),

                TextInput::make('total_area')
                    ->helperText('বর্গফুট বা বর্গমিটারে বাসার মোট আকার (যেমন: ১২০০ বর্গফুট)।')
                    ->numeric(),

                Select::make('floor_number')
                    ->label('ফ্লোর নম্বর')
                    ->helperText('বাসা কোন তলায় অবস্থিত (যেমন: ২য় তলা, ৫ম তলা)।')
                    ->multiple()
                    ->preload()
                    ->options([
                        'ground' => 'নিচ তলা',
                        '1st' => '১ম তলা',
                        '2nd' => '২য় তলা',
                        '3rd' => '৩য় তলা',
                        '4th' => '৪র্থ তলা',
                        '5th' => '৫ম তলা',
                        '6th' => '৬ষ্ঠ তলা',
                        '7th' => '৭ম তলা',
                        '8th' => '৮ম তলা',
                        '9th' => '৯ম তলা',
                        '10th' => '১০ম তলা',
                        '11th' => '১১তম তলা',
                        '12th' => '১২তম তলা',
                        '13th' => '১৩তম তলা',
                        '14th' => '১৪তম তলা',
                        '15th' => '১৫তম তলা',
                        '16th' => '১৬তম তলা',
                        '17th' => '১৭তম তলা',
                        '18th' => '১৮তম তলা',
                        '19th' => '১৯তম তলা',
                        '20th' => '২০তম তলা',
                    ]),

                Select::make('bedrooms')
                    ->label('শয়নকক্ষ')
                    ->helperText('বেডরুম কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('attached_bathroom')
                    ->label('সংযুক্ত বাথরুম')
                    ->helperText('সংযুক্ত বাথরুম কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('shared_bathroom')
                    ->label('সাধারণ বাথরুম')
                    ->helperText('সাধারণ বাথরুম কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('dining_rooms')
                    ->label('ডাইনিং রুম')
                    ->helperText('ডাইনিং রুম কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('living_rooms')
                    ->label('অতিথি কক্ষ')
                    ->helperText('ড্রইং রুম কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('study_rooms')
                    ->label('অধ্যয়ন কক্ষ')
                    ->helperText('পড়ার ঘর কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('store_rooms')
                    ->label('স্টোর রুম')
                    ->helperText('মালপত্র রাখার ঘর কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('balconies')
                    ->label('বারান্দা')
                    ->helperText('বারান্দা কতটি আছে নির্বাচন করুন')
                    ->options([
                        '1' => '১টি',
                        '2' => '২টি',
                        '3' => '৩টি',
                        '4' => '৪টি',
                        '5' => '৫টি',
                        '6' => '৬টি',
                        '7' => '৭টি',
                        '8' => '৮টি',
                        '9' => '৯টি',
                        '10' => '১০টি',
                    ]),

                Select::make('flooring')
                    ->label('মেঝের ধরন')
                    ->helperText('মেঝের ধরন নির্বাচন করুন')
                    ->options([
                        'tiles' => 'টাইলস',
                        'marble' => 'মার্বেল',
                        'wood' => 'কাঠ',
                        'cement' => 'সিমেন্ট',
                    ]),

                Select::make('walls')
                    ->label('দেয়ালের অবস্থা')
                    ->helperText('দেয়ালের অবস্থা নির্বাচন করুন')
                    ->options([
                        'plaster' => 'প্লাস্টার',
                        'paint' => 'রং / পেইন্ট',
                        'wallpaper' => 'ওয়ালপেপার',
                    ]),

                Select::make('windows')
                    ->label('জানালা')
                    ->helperText('জানালার ধরন নির্বাচন করুন।')
                    ->options([
                        'aluminum' => 'অ্যালুমিনিয়াম',
                        'glass' => 'কাচ',
                        'wood' => 'কাঠ',
                        'iron' => 'লোহা / ইস্পাত',
                    ]),

                Select::make('condition')
                    ->label('বর্তমান অবস্থা')
                    ->helperText('বাসার বর্তমান অবস্থা নির্বাচন করুন।')
                    ->options([
                        'new' => 'নতুন',
                        'old' => 'পুরাতন',
                        'very_old' => 'অধিক পুরাতন',
                    ]),

                Select::make('facing')
                    ->label('ঘরের দিক')
                    ->helperText('ঘরটি কোন মুখী সেটি নির্বাচন করুন।')
                    ->options([
                        'north' => 'উত্তর',
                        'south' => 'দক্ষিণ',
                        'east' => 'পূর্ব',
                        'west' => 'পশ্চিম',
                    ]),

                DatePicker::make('available_from')
                    ->label('বাড়ি পাওয়া যাবে')
                    ->helperText('বাসা কবে থেকে ভাড়া দেওয়া যাবে (যেমন: ১ জুলাই, ২০২৫ থেকে)।')
                    ->native(false),

                Select::make('is_urgent')
                    ->label('তাত্ক্ষণিক প্রয়োজন?')
                    ->helperText('যদি জরুরি ভিত্তিতে দিতে চান তবে "হ্যাঁ" নির্বাচন করুন।')
                    ->options([
                        '1' => 'হ্যাঁ',
                        '0' => 'না',
                    ]),

                Select::make('listing_type')
                    ->label('লিস্টিং এর ধরণ')
                    ->helperText('বাসাটি কি ভাড়া হবে নাকি বিক্রি হবে সেটি নির্বাচন করুন।')
                    ->options([
                        'rent' => 'ভাড়া',
                        'buy' => 'কেনা',
                        'sell' => 'বিক্রি',
                    ]),

                FileUpload::make('floor_plan')
                    ->label('ফ্লোরের নকশা')
                    ->multiple()
                    ->helperText('যদি ফ্লোরের নকশা দিতে চান তবে নকশাগুলো আপলোড করুন।')
                    ->disk('public')
                    ->directory('properties/floor-plan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('media.image_path')
                    ->label('Title')
                    ->width(100)
                    ->height(100)
                    ->limit(1)
                    ->circular(),

                TextColumn::make('address')
                    ->label('')
                    ->formatStateUsing(function ($record) {
                        return view('filament.tables.columns.property-card', [
                            'title' => $record->title,
                            'location' => $record?->address,
                            'rent' => number_format((float)$record->rentAndAdditionalCost?->monthly_rent,0).' / mo',
                        ])->render();
                    })
                    ->html(),

                TextColumn::make('created_at')
                    ->label('Published')
                    ->description(fn($record) => Carbon::parse($record->created_at)->toFormattedDateString())
                    ->formatStateUsing(fn($record) => Carbon::parse($record->created_at)->diffForHumans()),

                TextColumn::make('views_count')->label('Views'),
                ToggleColumn::make('is_available'),

//                Tables\Columns\TextColumn::make('user_id')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('landmark')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('latitude')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('longitude')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('area_type'),
//                Tables\Columns\TextColumn::make('property_type'),
//                Tables\Columns\TextColumn::make('tenant_type'),
//                Tables\Columns\TextColumn::make('total_area')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('bedrooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('bathrooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('dining_rooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('living_rooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('study_rooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('store_rooms')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('balconies')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('floor_plan')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('floor_number')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('flooring'),
//                Tables\Columns\TextColumn::make('walls'),
//                Tables\Columns\TextColumn::make('windows'),
//                Tables\Columns\TextColumn::make('condition'),
//                Tables\Columns\TextColumn::make('facing'),
//                Tables\Columns\TextColumn::make('available_from')
//                    ->date()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('views_count')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\IconColumn::make('is_urgent')
//                    ->boolean(),
//                Tables\Columns\TextColumn::make('listing_type'),
//                Tables\Columns\TextColumn::make('deleted_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
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
