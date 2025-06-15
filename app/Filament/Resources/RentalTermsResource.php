<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalTermsResource\Pages;
use App\Filament\Resources\RentalTermsResource\RelationManagers;
use App\Models\Property;
use App\Models\RentalTerms;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalTermsResource extends Resource
{
    protected static ?string $model = RentalTerms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contract Terms')
                    ->description('Key conditions and rules related to the rental agreement duration and breach terms.')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        Select::make('property_id')
                            ->label('Select Property')
                            ->required()
                            ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),

                        TextInput::make('contract_duration')
//                            ->label('চুক্তির মেয়াদ')
                            ->maxLength(255)
                            ->helperText('উদাহরণ: "ন্যূনতম ১ বছরের চুক্তি প্রয়োজন"'),

                        TextInput::make('contract_breach_terms')
//                            ->label('চুক্তি ভঙ্গের শর্ত')
                            ->helperText('উদাহরণ: "চুক্তি ভঙ্গ করলে ডিপোজিট ফেরতযোগ্য নয়"'),

                        TextInput::make('tenant_eligibility')
//                            ->label('ভাড়াটিয়ার যোগ্যতা')
                            ->helperText('উদাহরণ: "সাবলেট দিতে পারবে, বাড়িওয়ালার অনুমতি সাপেক্ষে"'),

                        TextInput::make('identity_verification')
//                            ->label('পরিচয় যাচাই')
                            ->helperText('উদাহরণ: "জাতীয় পরিচয়পত্র জমা দিতে হবে ইত্যাদি"'),

                        TextInput::make('background_check')
//                            ->label('পেছনের তথ্য যাচাই')
                            ->helperText('উদাহরণ: "পুলিশ ভেরিফিকেশন বা চাকরির তথ্য প্রয়োজন হতে পারে, পূর্ববর্তী বাড়িওয়ালার রেফারেন্স প্রয়োজন"'),
                    ]),

                Section::make('Payment Details')
                    ->description('Define how and when rent payments are made, including preferred methods.')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('payment_schedule')
//                    ->label('পেমেন্টের সময়সূচি')
                            ->helperText('উদাহরণ: "ভাড়া প্রতি মাসের ১-৭ তারিখের মধ্যে দিতে হবে"'),

                        TextInput::make('payment_methods')
//                    ->label('পেমেন্ট পদ্ধতি')
                            ->helperText('উদাহরণ: "বিকাশ, নগদ, রকেট, ব্যাংক ট্রান্সফার, চেক, ক্যাশ"'),
                    ]),

                Section::make('House Rules & Responsibilities')
                    ->description('Rules for property usage, maintenance, and accountability for damages.')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('house_usage_rules')
//                            ->label('ব্যবহারের নিয়মাবলী')
                            ->helperText('উদাহরণ: "দেয়ালে পেইন্টিং, ড্রিলিং বাড়িওয়ালার অনুমতি সাপেক্ষে"'),

                        TextInput::make('maintenance_responsibility')
//                            ->label('রক্ষণাবেক্ষণের দায়িত্ব')
                            ->helperText('উদাহরণ: "ছোট মেরামত ভাড়াটিয়ার, বড় মেরামত বাড়িওয়ালার"'),

                        TextInput::make('damage_liability')
//                            ->label('ক্ষতির দায়িত্ব')
                            ->helperText('উদাহরণ: "চুক্তি শেষে যৌথ পরিদর্শন। ক্ষতির জন্য ডিপোজিট থেকে কাটা হবে"'),
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
                Tables\Columns\TextColumn::make('contract_duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_breach_terms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tenant_eligibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identity_verification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('background_check')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_schedule')
                    ->searchable(),
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
            'index' => Pages\ListRentalTerms::route('/'),
            'create' => Pages\CreateRentalTerms::route('/create'),
            'edit' => Pages\EditRentalTerms::route('/{record}/edit'),
        ];
    }
}
