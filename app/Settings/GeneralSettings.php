<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_email;
    public ?string $header_logo; // FileUpload থেকে পাথ সেভ হবে
    public ?string $footer_logo; // FileUpload থেকে পাথ সেভ হবে
    public ?string $favicon;
    public bool $is_site_active;

    public static function group(): string
    {
        return 'general';
    }
}
