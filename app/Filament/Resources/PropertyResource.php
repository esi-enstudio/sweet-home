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
                            Section::make('প্রাথমিক তথ্য')
                                ->collapsible()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('title')
                                        ->label('শিরোনাম')
                                        ->helperText('একটি সংক্ষিপ্ত, আকর্ষণীয় ভূমিকা লিখুন যা বাসার সেরা বৈশিষ্ট্যগুলো তুলে ধরে। উদাহরণ: “বাস স্ট্যান্ড এ আধুনিক ৩ বেডরুমের ফ্ল্যাট, আলো-বাতাসপূর্ণ, ছোট পরিবারের জন্য আদর্শ।”')
//                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('address')
                                        ->label('ঠিকানা')
                                        ->helperText('এলাকার নাম, রাস্তা(যেমন: বঙ্গবন্ধু সরণি রোড, ভৈরব বাজার, ভৈরব, কিশোরগঞ্জ)।')
//                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('landmark')
                                        ->label('সুপরিচিত স্থান')
                                        ->helperText('কাছাকাছি সুপরিচিত স্থান (যেমন: “আনোয়ারা হাসপাতালের বিপরীত পাশে”)')
                                        ->maxLength(255),

                                    TextInput::make('environment')
                                        ->label('পরিবেশ')
                                        ->helperText('এলাকাটি কি শান্ত, পারিবারিক, ব্যস্ত, নিরাপদ? (যেমন: পারিবারিক পরিবেশ, নিরাপদ আবাসিক এলাকা)')
                                        ->maxLength(255),
                                ]),

                            Section::make('গুগল ম্যাপস ডেটা')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('অক্ষাংশ (latitude)')
                                        ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ  24.321456')
                                        ->step('any')
                                        ->numeric(),

                                    TextInput::make('দ্রাঘিমাংশ (longitude)')
                                        ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ 90.369852')
                                        ->step('any')
                                        ->numeric(),
                                ]),

                            Section::make('বাসার বিবরণ')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
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
                                ]),

                            Section::make('কক্ষ ও স্থানসমূহ')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
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
                                ]),

                            Section::make('ফিনিশিং ও অবস্থা')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
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
                                ]),


                            DatePicker::make('available_from')
                                ->label('বাড়ি পাওয়া যাবে')
                                ->helperText('বাসা কবে থেকে ভাড়া দেওয়া যাবে (যেমন: ১ জুলাই, ২০২৫ থেকে)।')
                                ->native(false),

                            Select::make('is_urgent')
                                ->label('তাত্ক্ষণিক প্রয়োজন?')
                                ->helperText('যদি জরুরি ভিত্তিতে দিতে চান তবে "হ্যাঁ" নির্বাচন করুন।')
                                ->options([
                                    'true' => 'হ্যাঁ',
                                    'false' => 'না',
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
                                ->helperText('যদি ফ্লোরের নকশা দিতে চান তবে নকশাগুলো আপলোড করুন।')
                                ->disk('public')
                                ->directory('properties/floor-plan'),
                        ]),

                    Wizard\Step::make('Amenities')
                        ->columns(2)
                        ->schema([
                            Section::make('অবস্থান ও পরিবেশ')
                                ->collapsible()
                                ->columns(2)
                                ->schema([
                                    TagsInput::make('nearby_facilities')
                                        ->label('নিকটস্থ সুবিধাসমূহ')
                                        ->hint('প্রতিটি পয়েন্ট লিখার পর Enter button প্রেস করুন।')
                                        ->helperText('উদাহরণ:হাসপাতাল, স্কুল, বাজার, মসজিদ, বাসস্ট্যান্ড ইত্যাদি।'),

                                    TagsInput::make('natural_environments')
                                        ->label('প্রাকৃতিক পরিবেশ')
                                        ->hint('প্রতিটি পয়েন্ট লিখার পর Enter button প্রেস করুন।')
                                        ->helperText('উদাহরণ:গাছপালা, খোলা জায়গা, নদী, লেক, পার্ক, পাহাড় ইত্যাদি।'),
                                ]),

                            Section::make('ইউটিলিটি ও অবকাঠামো')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    Select::make('gas_connection')
                                        ->label('গ্যাস সংযোগ')
                                        ->helperText('বাড়িতে গ্যাস সরবরাহের পদ্ধতি নির্বাচন করুন')
                                        ->options([
                                            'cylinder' => 'সিলিন্ডার',
                                            'pipeline' => 'পাইপলাইন',
                                        ]),
                                    Select::make('kitchen_type')
                                        ->label('রান্নাঘরের ধরন')
                                        ->helperText('রান্নাঘরটি সাধারণ নাকি ক্যাবিনেটযুক্ত তা নির্বাচন করুন')
                                        ->options([
                                            'general' => 'সাধারণ',
                                            'cabinet' => 'ক্যাবিনেটযুক্ত',
                                        ]),
                                    Select::make('electricity_type')
                                        ->label('বিদ্যুৎ ব্যবস্থার ধরন')
                                        ->helperText('প্রি-পেইড বা পোস্ট-পেইড বিদ্যুৎ সংযোগ বেছে নিন')
                                        ->default('postpaid')
                                        ->options([
                                            'prepaid' => 'প্রি-পেইড মিটার',
                                            'postpaid' => 'পোস্ট-পেইড মিটার',
                                        ]),
                                    TagsInput::make('water_quality')
                                        ->label('পানির মান')
                                        ->hint('প্রতিটি পয়েন্ট লিখার পর Enter button প্রেস করুন।')
                                        ->helperText('যেমন: গভীর নলকূপ, ফিল্টারকৃত, আয়রন মুক্ত অথবা আয়রন আছে ইত্যাদি।'),
                                    TextInput::make('water_tank')
                                        ->numeric()
                                        ->label('পানির ট্যাঙ্কের ধারণক্ষমতা (লিটার)')
                                        ->helperText('পানির ট্যাঙ্কের মোট ধারণক্ষমতা সংখ্যায় লিখুন। যেমনঃ ১০০০, ৩০০০, ৫০০০'),
                                    TagsInput::make('backup_power')
                                        ->label('ব্যাকআপ পাওয়ার ব্যবস্থা')
                                        ->hint('প্রতিটি পয়েন্ট লিখার পর Enter button প্রেস করুন।')
                                        ->helperText('যেমন: জেনারেটর, IPS, সোলার সিস্টেম'),
                                ]),

                            Section::make('বিল্ডিং এর সুবিধাসমূহ')
                                ->collapsed()
                                ->schema([
                                    Checkbox::make('has_lift')
                                        ->label('লিফট')
                                        ->helperText('ভবনে লিফট সুবিধা রয়েছে কি না'),
                                    Checkbox::make('has_parking')
                                        ->label('পার্কিং')
                                        ->helperText ('গাড়ি পার্কিং এর সুবিধা রয়েছে কি না'),
                                    Checkbox::make('has_roof_access')
                                        ->label('ছাদে প্রবেশাধিকার')
                                        ->helperText('ভবনের ছাদে প্রবেশের অনুমতি রয়েছে কি না'),
                                ]),

                            Section::make('নিরাপত্তা ও পর্যবেক্ষণ')
                                ->collapsed()
                                ->schema([
                                    Checkbox::make('has_cctv')
                                        ->label('সিসিটিভি')
                                        ->helperText('ভবনে সিসিটিভি ক্যামেরা রয়েছে কি না'),
                                    Checkbox::make('has_security_guard')
                                        ->label('নিরাপত্তাকর্মী')
                                        ->helperText('২৪/৭ নিরাপত্তাকর্মী নিয়োজিত রয়েছে কি না'),
                                ]),

                            Section::make('অন্যান্য')
                                ->collapsed()
                                ->schema([
                                    Checkbox::make('pets_allowed')
                                        ->label('পোষা প্রাণী অনুমোদিত')
                                        ->helperText('এই স্থানে পোষা প্রাণী রাখা অনুমোদিত কি না'),
                                ]),
                        ]),

                    Wizard\Step::make('ভাড়া ও খরচ')
                        ->schema([
                            Section::make('ভাড়ার বিস্তারিত')
                                ->collapsible()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('monthly_rent')
                                        ->label('মাসিক ভাড়া')
                                        ->helperText('বাসার জন্য প্রতি মাসে নির্ধারিত ভাড়া লিখুন')
                                        ->numeric(),
                                    TagsInput::make('rent_includes')
                                        ->label('ভাড়ার মধ্যে অন্তর্ভুক্ত')
                                        ->hint('প্রতিটি পয়েন্ট লিখার পর Enter button প্রেস করুন।')
                                        ->helperText('যেমন: ইউটিলিটি বিল, সার্ভিস চার্জ'),
                                    TextInput::make('rent_increase_possibility')
                                        ->label('ভাড়া বৃদ্ধির সম্ভাবনা')
                                        ->helperText('ভাড়া বৃদ্ধির সম্ভাবনা লিখুন, যেমন: প্রতি বছর ৫% বৃদ্ধির সম্ভাবনা অথবা অন্যান্য'),
                                    Select::make('is_negotiable')
                                        ->label('ভাড়া দর-কষাকষি করা যাবে কিনা')
                                        ->helperText('দর-কষাকষি সম্ভব কিনা নির্ধারণ করুন')
                                        ->options([
                                            'negotiable' => 'আলোচনা সাপেক্ষ',
                                            'fixed' => 'নির্ধারিত',
                                        ]),
                                ]),

                            Section::make('বিল')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('water_bill')
                                        ->label('পানির বিল')
                                        ->helperText('মাসিক পানির বিলের পরিমাণ লিখুন (যদি থাকে)')
                                        ->numeric(),
                                    TextInput::make('gas_bill')
                                        ->label('গ্যাস বিল')
                                        ->helperText('মাসিক গ্যাস বিলের পরিমাণ লিখুন (যদি থাকে)')
                                        ->numeric(),
                                    TextInput::make('electricity_bill')
                                        ->label('বিদ্যুৎ বিল')
                                        ->helperText('মাসিক বিদ্যুৎ বিলের পরিমাণ লিখুন (যদি থাকে)')
                                        ->numeric(),
                                ]),

                            Section::make('অতিরিক্ত খরচ')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('service_charge')
                                        ->label('সার্ভিস চার্জ')
                                        ->helperText('যদি থাকে, মাসিক সার্ভিস চার্জ লিখুন')
                                        ->numeric(),
                                    TextInput::make('lift_charge')
                                        ->label('লিফট চার্জ')
                                        ->helperText('যদি থাকে, লিফট ব্যবহারের জন্য অতিরিক্ত চার্জ লিখুন')
                                        ->numeric(),
                                    TextInput::make('generator_charge')
                                        ->label('জেনারেটর চার্জ')
                                        ->helperText('যদি থাকে, জেনারেটরের জন্য অতিরিক্ত চার্জ লিখুন')
                                        ->numeric(),
                                    TextInput::make('parking_fee')
                                        ->label('পার্কিং ফি')
                                        ->helperText('যদি থাকে, গাড়ি বা বাইকের জন্য পার্কিং চার্জ লিখুন')
                                        ->numeric(),
                                ]),

                            Section::make('অগ্রিম পেমেন্ট')
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('advance_rent_months')
                                        ->label('অগ্রিম ভাড়া (মাস)')
                                        ->helperText('কত মাসের অগ্রিম ভাড়া চাচ্ছেন')
                                        ->maxLength(2)
                                        ->numeric(),
                                    Select::make('advance_payment_terms')
                                        ->label('অগ্রিম ফেরতযোগ্যতা')
                                        ->helperText('অগ্রিম ভাড়া ফেরতযোগ্য কিনা নির্বাচন করুন')
                                        ->options([
                                            'refundable' => 'ফেরতযোগ্য',
                                            'non-refundable' => 'অফেরতযোগ্য',
                                        ]),
                                ]),
                        ]),

                    Wizard\Step::make('Rental Terms')
                        ->schema([
                            Section::make('Contract Terms')
                                ->collapsible()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('contract_duration')
                                        ->maxLength(255)
                                        ->helperText('উদাহরণ: "ন্যূনতম ১ বছরের চুক্তি প্রয়োজন"'),
                                    TextInput::make('contract_breach_terms')
                                        ->helperText('উদাহরণ: "চুক্তি ভঙ্গ করলে ডিপোজিট ফেরতযোগ্য নয়"'),
                                ]),

                            Section::make('Tenant Eligibility & Verification')
                                ->collapsed()
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
                                ->collapsed()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('payment_schedule')
                                        ->helperText('উদাহরণ: "ভাড়া প্রতি মাসের ১-৭ তারিখের মধ্যে দিতে হবে"'),
                                    TextInput::make('payment_methods')
                                        ->helperText('উদাহরণ: "বিকাশ, নগদ, রকেট, ব্যাংক ট্রান্সফার, চেক, ক্যাশ"'),
                                ]),

                            Section::make('House Usage & Responsibilities')
                                ->collapsed()
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
