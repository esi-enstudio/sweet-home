<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Sweet Home');
        $this->migrator->add('general.header_logo', 'logos/01JYXJ25FQ41KE363Q4YV9GE12.png');
        $this->migrator->add('general.footer_logo', 'logos/01JYXJ25FTK63AT9MGZZ5JY0AX.png');
        $this->migrator->add('general.favicon', 'logos/favicon/01JYXJ25FWH49J8NESMV11ZATM.png');
        $this->migrator->add('general.site_email', 'info@sweethome.com');
        $this->migrator->add('general.is_site_active', true);
    }
};
