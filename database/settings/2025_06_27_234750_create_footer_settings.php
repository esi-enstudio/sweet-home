<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('footer.about_section_paragraph', 'স্বপ্নের বাড়ি খুঁজছেন? আমাদের প্ল্যাটফর্মের প্রপার্টি থেকে আপনার পছন্দের বাড়িটি কিনুন, বিক্রি করুন বা ভাড়া নিন।');
        $this->migrator->add('footer.address', 'Chondiber, Bhairab, Kishoreganj.');
        $this->migrator->add('footer.contact_number', '+880 1401 607080');
        $this->migrator->add('footer.email', 'info@sweethome.com');
        $this->migrator->add('footer.social_links', []);
        $this->migrator->add('footer.copyright', 'All Rights Reserved @ Sweet Home');
    }

    public function down(): void
    {
        $this->migrator->delete('footer.about_section_paragraph');
        $this->migrator->delete('footer.address');
        $this->migrator->delete('footer.contact_number');
        $this->migrator->delete('footer.email');
        $this->migrator->delete('footer.social_links');
        $this->migrator->delete('footer.copyright');
    }
};
