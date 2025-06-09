<?php

use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->json('nearby_facilities')->nullable();
            $table->json('natural_environments')->nullable();
            $table->enum('gas_connection', ['cylinder', 'pipeline'])->nullable();
            $table->enum('kitchen_type', ['general', 'cabinet'])->nullable();
            $table->boolean('has_lift')->default(false);
            $table->string('water_quality')->nullable();  // e.g. "নরম পানি, পানীয়ের জন্য উপযুক্ত"
            $table->string('water_tank')->nullable();      // e.g. "৫,০০০ লিটার পানির রিজার্ভার"
            $table->enum('electricity_type', ['prepaid', 'postpaid'])->nullable();
            $table->string('backup_power')->nullable();    // e.g. "জেনারেটর", "IPS/UPS সুবিধা"
            $table->boolean('has_cctv')->default(false);    // e.g. "৪টি সিসিটিভি ক্যামেরা, ২৪ ঘণ্টা মনিটরিং"
            $table->boolean('has_security_guard')->default(false); // e.g. "২৪ ঘণ্টা দারোয়ান সার্ভিস, ২ জন প্রহরী"
            $table->boolean('has_parking')->default(false);     // e.g. "১টি ব্যক্তিগত গাড়ি পার্কিং স্পেস"
            $table->boolean('has_roof_access')->default(false);     // e.g. "ব্যক্তিগত, শেয়ার্ড ছাদ, কাপড় শুকানোর জন্য উপযুক্ত"
            $table->boolean('pets_allowed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};
