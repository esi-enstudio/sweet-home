<?php
namespace App\Filament\Pages;

use App\Settings\ContactPageSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ContactPage extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 3;
    protected static string $settings = ContactPageSettings::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Banner & Titles')
                ->schema([
                    Forms\Components\TextInput::make('banner_title')->default('Contact Us'),
                    Forms\Components\TextInput::make('form_title')->label('Form Title')->default('Get A ContactPage'),
                ]),

            Forms\Components\Fieldset::make('Contact Page Cards')
                ->columns(1)
                ->schema([
                    Forms\Components\Repeater::make('contact_cards')
                        ->columns(3)
                        ->maxItems(3)
                        ->defaultItems(3)
                        ->schema([
                            Forms\Components\Group::make([
                                Forms\Components\TextInput::make('title')
                                    ->required(),

                                Forms\Components\RichEditor::make('details'),
                            ])->columnSpan(2),

                            Forms\Components\Group::make([
                                Forms\Components\FileUpload::make('icon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('Contact/icons'),
                            ])->columnSpan(1),
                        ]),
                ]),
        ]);
    }
}
