<?php

namespace App\Filament\Pages;

use App\Settings\HomepageSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Homepage extends SettingsPage
{
//    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    protected static string $settings = HomepageSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Fieldset::make('Spotlight Section')
                        ->schema([
                            Forms\Components\TextInput::make('spotlight_section_title')->label('Title')->required(),
                            Forms\Components\TextInput::make('spotlight_section_btn_label')->label('Button Text')->required(),
                        ])
                ])->columnSpan(2),

                Forms\Components\Group::make([
                    //
                ])->columnSpan(1),
            ]);
    }
}
