<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Sweet Home');
        $this->migrator->add('general.site_logo', null);
        $this->migrator->add('general.site_second_logo', null);
        $this->migrator->add('general.favicon', null);
        $this->migrator->add('general.site_email', 'info@sweethome.com');
        $this->migrator->add('general.is_site_active', true);
    }
};
