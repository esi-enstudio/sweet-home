<?php

namespace App\Filament\Pages;

use App\Settings\FooterSettings;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Footer extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 4;

    protected static string $settings = FooterSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Section::make('Footer Start Section')
                        ->collapsible()
                        ->schema([
                            TextInput::make('about_section_paragraph')
                                ->label('About Paragraph'),

                            TextInput::make('address'),

                            TextInput::make('contact_number')
                                ->label('Contact Number')
                                ->tel(),

                            TextInput::make('email')
                                ->label('Email Address')
                                ->email(),

                            Forms\Components\KeyValue::make('social_links')
                                ->label('Social Media Links')
                                ->keyLabel('Platform Name') // Key ফিল্ডের লেবেল
                                ->valueLabel('Profile URL') // Value ফিল্ডের লেবেল
                                ->reorderable()
                                ->addActionLabel('Add Social Link')
                                ->columnSpanFull()
                                ->helperText('Enter the social media platform name (e.g., facebook, twitter) and the full URL.'),

                            TextInput::make('copyright'),
                        ]),
                ])->columnSpan(2),

                Forms\Components\Group::make([
                    //
                ])->columnSpan(1),
            ]);
    }
}
