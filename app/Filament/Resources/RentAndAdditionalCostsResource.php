<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentAndAdditionalCostsResource\Pages;
use App\Filament\Resources\RentAndAdditionalCostsResource\RelationManagers;
use App\Models\Property;
use App\Models\RentAndAdditionalCosts;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentAndAdditionalCostsResource extends Resource
{
    protected static ?string $model = RentAndAdditionalCosts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Rent & Costs';

    protected static ?string $navigationParentItem = 'My Properties';

    public static function form(Form $form): Form
    {
        return $form
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

                Section::make('Rent Overview')
                    ->description('Basic information about the rent amount and its negotiation terms.')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('monthly_rent')
//                            ->label('মাসিক ভাড়া')
                            ->helperText('বাসার জন্য প্রতি মাসে নির্ধারিত ভাড়া লিখুন')
                            ->numeric(),

                        TagsInput::make('rent_includes')
                            ->splitKeys(['Tab',','])
//                            ->label('ভাড়ার মধ্যে অন্তর্ভুক্ত')
                            ->helperText('যেমন: ইউটিলিটি বিল, সার্ভিস চার্জ'),

                        TextInput::make('rent_increase_possibility')
//                            ->label('ভাড়া বৃদ্ধির সম্ভাবনা')
                            ->helperText('ভাড়া বৃদ্ধির সম্ভাবনা লিখুন, যেমন: প্রতি বছর ৫% বৃদ্ধির সম্ভাবনা অথবা অন্যান্য'),

                        Select::make('is_negotiable')
//                            ->label('ভাড়া দর-কষাকষি করা যাবে কিনা')
                            ->helperText('দর-কষাকষি সম্ভব কিনা নির্ধারণ করুন')
                            ->default('negotiable')
                            ->options([
                                'negotiable' => 'আলোচনা সাপেক্ষ',
                                'fixed' => 'নির্ধারিত',
                            ]),
                    ]),

                Section::make('Utility & Service Charges')
                    ->description('Specify all additional monthly charges associated with the property.')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('water_bill')
//                            ->label('পানির বিল')
                            ->helperText('মাসিক পানির বিলের পরিমাণ লিখুন (যদি থাকে)')
                            ->numeric(),

                        TextInput::make('gas_bill')
//                            ->label('গ্যাস বিল')
                            ->helperText('মাসিক গ্যাস বিলের পরিমাণ লিখুন (যদি থাকে)')
                            ->numeric(),

                        TextInput::make('electricity_bill')
//                            ->label('বিদ্যুৎ বিল')
                            ->helperText('মাসিক বিদ্যুৎ বিলের পরিমাণ লিখুন (যদি থাকে)')
                            ->numeric(),

                        TextInput::make('service_charge')
//                            ->label('সার্ভিস চার্জ')
                            ->helperText('যদি থাকে, মাসিক সার্ভিস চার্জ লিখুন')
                            ->numeric(),

                        TextInput::make('lift_charge')
//                            ->label('লিফট চার্জ')
                            ->helperText('যদি থাকে, লিফট ব্যবহারের জন্য অতিরিক্ত চার্জ লিখুন')
                            ->numeric(),

                        TextInput::make('generator_charge')
//                            ->label('জেনারেটর চার্জ')
                            ->helperText('যদি থাকে, জেনারেটরের জন্য অতিরিক্ত চার্জ লিখুন')
                            ->numeric(),

                        TextInput::make('parking_fee')
//                            ->label('পার্কিং ফি')
                            ->helperText('যদি থাকে, গাড়ি বা বাইকের জন্য পার্কিং চার্জ লিখুন')
                            ->numeric(),
                    ]),

                Section::make('Advance Payment Terms')
                    ->description('Define how many months’ advance is required and whether it is refundable.')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('advance_rent_months')
                            ->label('Advance rent (months)')
                            ->helperText('কত মাসের অগ্রিম ভাড়া চাচ্ছেন')
                            ->maxLength(2)
                            ->numeric(),

                        Select::make('advance_payment_terms')
//                    ->label('অগ্রিম ফেরতযোগ্যতা')
                            ->helperText('অগ্রিম ভাড়া ফেরতযোগ্য কিনা নির্বাচন করুন')
                            ->options([
                                'refundable' => 'ফেরতযোগ্য',
                                'non-refundable' => 'অফেরতযোগ্য',
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
                Tables\Columns\TextColumn::make('monthly_rent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent_includes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rent_increase_possibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_negotiable'),
                Tables\Columns\TextColumn::make('water_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gas_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('electricity_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lift_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('generator_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parking_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('advance_rent_months')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('advance_payment_terms'),
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
            'index' => Pages\ListRentAndAdditionalCosts::route('/'),
            'create' => Pages\CreateRentAndAdditionalCosts::route('/create'),
            'edit' => Pages\EditRentAndAdditionalCosts::route('/{record}/edit'),
        ];
    }
}
