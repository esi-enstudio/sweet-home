<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('homepage.spotlight_section_title', 'Spotlight');
        $this->migrator->add('homepage.spotlight_section_btn_label', 'View Detail\'s');
        $this->migrator->add('homepage.featured_showcase_section_title', 'Featured Showcase');
        $this->migrator->add('homepage.our_service_section_name', 'Our Services');
        $this->migrator->add('homepage.our_service_section_title', 'Our Main Focus');
        $this->migrator->add('homepage.services', []);
        $this->migrator->add('homepage.amenity_section_name', 'Our Amenities');
        $this->migrator->add('homepage.amenity_section_title', 'Building Amenities');
    }

    public function down(): void
    {
        $this->migrator->delete('homepage.spotlight_section_title');
        $this->migrator->delete('homepage.spotlight_section_btn_label');
        // ... এবং বাকি সব
    }
};
