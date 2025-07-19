<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_page.banner_title', 'Contact Us');
        $this->migrator->add('contact_page.form_title', 'Get A Contact');
        $this->migrator->add('contact_page.contact_cards', []);
    }

    public function down(): void
    {
        $this->migrator->delete('contact_page.banner_title');
        $this->migrator->delete('contact_page.form_title');
        $this->migrator->delete('contact_page.contact_cards');
    }
};
