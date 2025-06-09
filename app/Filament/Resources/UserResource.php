<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Filament\Resources\Concerns\Translatable;

class UserResource extends Resource
{

    use Translatable;
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->numeric()
                    ->minLength(11)
                    ->maxLength(11)
                    ->rule('digits:11')
                    ->hint(function (Get $get) {
                        // শুধু create পেজে hint দেখানোর জন্য
                        if (!str(request()->route()->getName())->contains('.create')) {
                            return null;
                        }

                        $value = $get('phone_number');

                        if (!$value || strlen($value) !== 11) {
                            return new HtmlString('<span class="text-gray-500">Enter a valid 11-digit number</span>');
                        }

                        $exists = User::where('phone_number', $value)->exists();

                        return new HtmlString(
                            $exists
                                ? '<span class="text-red-600 font-medium">Not available</span>'
                                : '<span class="text-green-600 font-medium">Available</span>'
                        );
                    })
                    ->hintIcon('heroicon-o-phone')
                    ->live(onBlur: true)
                    ->reactive(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('password')
                    ->password()
                    ->rule(Password::default())
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context) => $context === 'create')
                    ->maxLength(255),

                TextInput::make('password_confirmation')
                    ->password()
                    ->requiredWith('password')
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => filled($state)) // Ignore empty values on update
                    ->same('password'),

                Select::make('status')
                    ->default('active')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),

                Forms\Components\TextInput::make('custom_fields'),

                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),

                FileUpload::make('avatar_url')
                    ->label('Avatar')
                    ->disk('public')
                    ->directory('avatars'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_url'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Str::title($state))
                    ->color('danger'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        default => 'warning',
                    })
                    ->formatStateUsing(fn ($state) => Str::title($state))
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
            'index' => Pages\ListUsers::route('/'),
//            'create' => Pages\CreateUser::route('/create'),
//            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
