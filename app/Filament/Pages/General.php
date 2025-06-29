<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class General extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Fieldset::make('Basic Info')
                        ->schema([
                            Forms\Components\TextInput::make('site_name')->required(),
                            Forms\Components\Toggle::make('is_site_active')
                                ->columnSpanFull()
                                ->label('Site Active'),
                        ])
                ])->columnSpan(2),

                Forms\Components\Group::make([
                    Forms\Components\Fieldset::make('Logo/Favicon')
                        ->columns(1)
                        ->schema([
                            Forms\Components\FileUpload::make('header_logo')->image()->directory('logos'),
                            Forms\Components\FileUpload::make('footer_logo')->image()->directory('logos'),
                            Forms\Components\FileUpload::make('favicon')->image()->directory('logos/favicon'),
                        ])
                ])->columnSpan(1),
            ]);
    }
}
