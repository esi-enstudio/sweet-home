<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmenityResource\Pages;
use App\Filament\Resources\AmenityResource\RelationManagers;
use App\Models\Amenity;
use App\Models\Property;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AmenityResource extends Resource
{
    protected static ?string $model = Amenity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

//    protected static ?string $navigationLabel = 'সুবিধা ও বৈশিষ্ট্য';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Property Selection')
                            ->collapsible()
                            ->description('Select the property to which these amenities and features will be associated.')
                            ->schema([
                                Select::make('property_id')
                                    ->label('Select Property')
                                    ->required()
                                    ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),
                            ]),

                        Section::make('Utility Information')
                            ->collapsed()
                            ->description('Define the available utility connections and their types within the property.')
                            ->schema([
                                Select::make('gas_connection')
//                                ->label('গ্যাস সংযোগ')
                                    ->helperText('বাড়িতে গ্যাস সরবরাহের পদ্ধতি নির্বাচন করুন')
                                    ->options([
                                        'cylinder' => 'সিলিন্ডার',
                                        'pipeline' => 'পাইপলাইন',
                                    ]),

                                Select::make('kitchen_type')
//                                ->label('রান্নাঘরের ধরন')
                                    ->helperText('রান্নাঘরটি সাধারণ নাকি ক্যাবিনেটযুক্ত তা নির্বাচন করুন')
                                    ->options([
                                        'general' => 'সাধারণ',
                                        'cabinet' => 'ক্যাবিনেটযুক্ত',
                                    ]),

                                Select::make('electricity_type')
//                                ->label('বিদ্যুৎ ব্যবস্থার ধরন')
                                    ->helperText('প্রি-পেইড বা পোস্ট-পেইড বিদ্যুৎ সংযোগ বেছে নিন')
                                    ->default('postpaid')
                                    ->options([
                                        'prepaid' => 'প্রি-পেইড মিটার',
                                        'postpaid' => 'পোস্ট-পেইড মিটার',
                                    ]),

                                TagsInput::make('water_quality')
                                    ->splitKeys(['Tab',','])
//                                ->label('পানির মান')
                                    ->helperText('যেমন: গভীর নলকূপ, ফিল্টারকৃত, আয়রন মুক্ত অথবা আয়রন আছে ইত্যাদি।'),

                                TextInput::make('water_tank')
                                    ->numeric()
//                                ->label('পানির ট্যাঙ্কের ধারণক্ষমতা (লিটার)')
                                    ->helperText('পানির ট্যাঙ্কের মোট ধারণক্ষমতা সংখ্যায় লিখুন। যেমনঃ ১০০০, ৩০০০, ৫০০০'),
                            ]),
                    ]),

                Group::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Nearby & Natural Environment')
                            ->collapsed()
                            ->description('List the nearby facilities and natural surroundings that enhance the property\'s value and lifestyle.')
                            ->schema([
                                TagsInput::make('natural_environments')->splitKeys(['Tab',',']),
                                TagsInput::make('nearby_facilities')->splitKeys(['Tab',',']),
                            ]),

                        Section::make('Backup & Safety Features')
                            ->collapsed()
                            ->description('Indicate the backup power systems and security features that ensure comfort and protection.')
                            ->schema([
                                TagsInput::make('backup_power')
//                                ->label('ব্যাকআপ পাওয়ার ব্যবস্থা')
                                    ->helperText('যেমন: জেনারেটর, IPS, সোলার সিস্টেম')
                                    ->splitKeys(['Tab',',']),

                                Toggle::make('has_lift')
//                                ->label('লিফট')
                                    ->helperText('ভবনে লিফট সুবিধা রয়েছে কিনা'),

                                Toggle::make('has_parking')
//                                ->label('পার্কিং')
                                    ->helperText ('গাড়ি পার্কিং এর সুবিধা রয়েছে কিনা'),

                                Toggle::make('has_roof_access')
//                                ->label('ছাদে প্রবেশাধিকার')
                                    ->helperText('ভবনের ছাদে প্রবেশের অনুমতি রয়েছে কিনা'),

                                Toggle::make('has_cctv')
//                                ->label('সিসিটিভি')
                                    ->helperText('ভবনে সিসিটিভি ক্যামেরা রয়েছে কিনা'),

                                Toggle::make('has_security_guard')
//                                ->label('নিরাপত্তাকর্মী')
                                    ->helperText('২৪/৭ নিরাপত্তাকর্মী নিয়োজিত রয়েছে কিনা'),

                                Toggle::make('pets_allowed')
//                                ->label('পোষা প্রাণী অনুমোদিত')
                                    ->helperText('এই স্থানে পোষা প্রাণী রাখা অনুমোদিত কিনা'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gas_connection'),
                Tables\Columns\TextColumn::make('kitchen_type'),
                Tables\Columns\IconColumn::make('has_lift')
                    ->boolean(),
                Tables\Columns\TextColumn::make('water_quality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('water_tank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('electricity_type'),
                Tables\Columns\TextColumn::make('backup_power')
                    ->searchable(),
                Tables\Columns\IconColumn::make('has_cctv')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_security_guard')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_parking')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_roof_access')
                    ->boolean(),
                Tables\Columns\IconColumn::make('pets_allowed')
                    ->boolean(),
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
            'index' => Pages\ListAmenities::route('/'),
            'create' => Pages\CreateAmenity::route('/create'),
            'edit' => Pages\EditAmenity::route('/{record}/edit'),
        ];
    }
}
