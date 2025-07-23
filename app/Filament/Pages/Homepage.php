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
                    Forms\Components\Section::make('Spotlight Section')
                        ->collapsible()
                        ->schema([
                            Forms\Components\TextInput::make('spotlight_section_title')->label('Title')->required(),
                            Forms\Components\TextInput::make('spotlight_section_btn_label')->label('Button Text')->required(),
                        ]),

                    Forms\Components\Section::make('Featured Showcase Section')
                        ->collapsed()
                        ->schema([
                            Forms\Components\TextInput::make('featured_showcase_section_title')->label('Title')->required(),
                        ]),

                    Forms\Components\Section::make('Our Service Section')
                        ->collapsed()
                        ->schema([
                            Forms\Components\TextInput::make('our_service_section_name')->label('Name')->required(),
                            Forms\Components\TextInput::make('our_service_section_title')->label('Title')->required(),
                            Forms\Components\Repeater::make('services')
                                ->label('Service Cards')
                                ->collapsible()
                                ->schema([
                                    Forms\Components\FileUpload::make('icon')
                                        ->label('Icon Image')
                                        ->columnSpanFull()
                                        ->image()
                                        ->disk('public')
                                        ->directory('property/icons/service-icons')
                                        ->required(),

                                    Forms\Components\TextInput::make('title')
                                        ->columnSpanFull()
                                        ->label('Card Title')
                                        ->required(),

                                    Forms\Components\Textarea::make('description')
                                        ->label('Card Description')
                                        ->live()
                                        ->maxLength(235) // Set the maximum character limit
                                        ->hint(fn ($state, $component) => strlen($state) . '/' . $component->getMaxLength())
                                        ->rows(3)
                                        ->columnSpanFull()
                                        ->required(),

                                    Forms\Components\TextInput::make('button_text')
                                        ->label('Button Text')
                                        ->required(),

                                    Forms\Components\Tabs::make('Link Type')
                                        ->tabs([
                                            Forms\Components\Tabs\Tab::make('URL')
                                                ->schema([
                                                    Forms\Components\TextInput::make('button_link_url')
                                                        ->label('Custom URL')
                                                        ->url()
                                                        ->helperText('Use this for external links or simple internal pages like /about-us.'),
                                                ]),

                                            Forms\Components\Tabs\Tab::make('Route')
                                                ->schema([
                                                    Forms\Components\Select::make('button_link_route_name')
                                                        ->label('Select a Route')
                                                        ->options([
                                                            // আপনার প্রয়োজনীয় রাউটগুলো এখানে যোগ করুন
                                                            'properties' => 'Property List Page',
                                                        ])
                                                        ->helperText('Select a predefined route.'),

                                                    Forms\Components\KeyValue::make('button_link_route_params')
                                                        ->label('Route Parameters')
                                                        ->keyLabel('Filter Name') // Key ফিল্ডের লেবেল পরিবর্তন
                                                        ->valueLabel('Filter Value') // Value ফিল্ডের লেবেল পরিবর্তন
                                                        ->helperText('Enter filter name and its value. Examples: - **Key:** selectedListingTypes, **Value:** rent - **Key:** selectedTypes, **Value:** 1 (use Property Type ID) - **Key:** selectedAmenities, **Value:** 5 (use Amenity ID) - **Key:** bedrooms, **Value:** 3'
                                                        )
                                                        ->reorderable(),
                                                ]),
                                        ])->columnSpanFull(),
                                ])
                                ->columnSpanFull()
                                ->required()
                                ->columns(2) // Repeater-এর ভেতরের ফিল্ডগুলো দুটি কলামে দেখাবে
                                ->defaultItems(3) // ডিফল্টভাবে ৩টি আইটেম দেখাবে
                                ->maxItems(3)     // সর্বোচ্চ ৩টি আইটেম যোগ করা যাবে
                                ->addActionLabel('Add New Service Card'),
                        ]),

                    Forms\Components\Section::make('Amenity Section')
                        ->collapsed()
                        ->schema([
                            Forms\Components\TextInput::make('amenity_section_name')->label('Name')->required(),
                            Forms\Components\TextInput::make('amenity_section_title')->label('Title')->required(),
                        ]),
                ])->columnSpan(2),

                Forms\Components\Group::make([
                    //
                ])->columnSpan(1),
            ]);
    }
}
