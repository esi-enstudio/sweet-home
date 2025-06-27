<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomepageSettings extends Settings
{
    public string $spotlight_section_title;
    public string $spotlight_section_btn_label;

    public static function group(): string
    {
        return 'homepage';
    }
}
