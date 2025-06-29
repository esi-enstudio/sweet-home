<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('homepage.spotlight_section_title', 'spotlight');
        $this->migrator->add('homepage.spotlight_section_btn_label', 'View Detail\'s');
        $this->migrator->add('homepage.featured_showcase_section_title', 'featured showcase');
        $this->migrator->add('homepage.our_service_section_name', 'our services');
        $this->migrator->add('homepage.our_service_section_title', 'our main focus');
    }
};
