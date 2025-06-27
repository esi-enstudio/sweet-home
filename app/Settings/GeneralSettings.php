<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_email;
    public ?string $site_logo; // FileUpload থেকে পাথ সেভ হবে
    public ?string $site_second_logo; // FileUpload থেকে পাথ সেভ হবে
    public ?string $favicon;
    public bool $is_site_active;

    public static function group(): string
    {
        return 'general';
    }
}
