<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('homepage.spotlight_section_title', 'Spotlight');
        $this->migrator->add('homepage.spotlight_section_btn_label', 'View Detail\'s');
    }
};
