<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Property;
use App\Models\Union;
use App\Models\Upazila;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('property_id')
                    ->label('Select Property')
                    ->required()
                    ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),

                Select::make('division_id')
                    ->label('Division')
                    ->required()
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set){
                        $set('district_id', null);
                        $set('upazila_id', null);
                        $set('union_id', null);
                    })
                    ->options(fn() => Division::all()->pluck('bn_name','id')),

                Select::make('district_id')
                    ->label('District')
                    ->required()
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set){
                        $set('upazila_id', null);
                        $set('union_id', null);
                    })
                    ->options(fn(Get $get) => District::query()
                        ->where('division_id', $get('division_id'))
                        ->pluck('bn_name','id')
                    ),

                Select::make('upazila_id')
                    ->label('Upazila')
                    ->required()
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set){
                        $set('union_id', null);
                    })
                    ->options(fn(Get $get) => Upazila::query()
                        ->where('district_id', $get('district_id'))
                        ->pluck('bn_name','id')
                    ),

                Select::make('union_id')
                    ->label('Union')
                    ->searchable()
                    ->options(fn(Get $get) => Union::query()
                        ->where('upazila_id', $get('upazila_id'))
                        ->pluck('bn_name','id')
                    ),

                TextInput::make('area_name')
//                    ->label('ঠিকানা')
                    ->helperText('এলাকার নাম, রাস্তা(যেমন: বঙ্গবন্ধু সরণি রোড, ভৈরব বাজার / চন্দিবের মধ্যপাড়া ইত্যাদি)।')
                    ->maxLength(255),

                Select::make('area_type')
//                    ->label('এলাকার ধরন')
                    ->helperText('শহুরে (উচ্চ-ঘনত্ব), আধা-শহুরে, বা গ্রামীণ এলাকা')
                    ->options([
                        'urban' => 'শহুরে',
                        'semi_urban' => 'আধা শহুরে',
                        'rural' => 'গ্রামীণ',
                    ]),

                TextInput::make('landmark')
//                    ->label('সুপরিচিত স্থান')
                    ->helperText('কাছাকাছি সুপরিচিত স্থান (যেমন: “আনোয়ারা হাসপাতালের বিপরীত পাশে”)')
                    ->maxLength(255),

                TextInput::make('latitude')
//                    ->label('অক্ষাংশ (latitude)')
                    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ  24.321456')
                    ->numeric(),

                TextInput::make('longitude')
//                    ->label('দ্রাঘিমাংশ (longitude)')
                    ->helperText('গুগল ম্যাপ বা ওপেনস্ট্রিটম্যাপ এর জন্য। উদাহরনঃ 90.369852')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('division_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('district_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('upazila_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('union_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area_type'),
                Tables\Columns\TextColumn::make('landmark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
