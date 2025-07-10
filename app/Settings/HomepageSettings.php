<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomepageSettings extends Settings
{
    public string $spotlight_section_title;
    public string $spotlight_section_btn_label;
    public string $featured_showcase_section_title;
    public string $our_service_section_name;
    public string $our_service_section_title;

    // Repeater থেকে আসা ডেটা সংরক্ষণের জন্য
    public ?array $services;
    public string $amenity_section_name;
    public string $amenity_section_title;

    public static function group(): string
    {
        return 'homepage';
    }
}
