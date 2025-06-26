<?php

use App\Models\District;
use App\Models\Division;
use App\Models\PropertyType;
use App\Models\Tenant;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_id')->unique(); // For display like "HZ29"
            $table->string('slug')->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(PropertyType::class)->constrained();
            $table->foreignIdFor(Tenant::class)->constrained();
            $table->string('title', 255);
            $table->text('description')->nullable();

            // --- Property Details ---
            $table->enum('listing_type', ['rent', 'sell', 'buy']);
            $table->unsignedInteger('total_area');
            $table->unsignedTinyInteger('bedrooms')->default(0);
            $table->unsignedTinyInteger('bathrooms')->default(0);
            $table->unsignedTinyInteger('balconies')->default(0);
            $table->string('floor_number')->nullable();
            $table->enum('facing', ['north', 'south', 'east', 'west', 'north_east', 'south_west'])->nullable();
            $table->year('year_built')->nullable();
            $table->string('thumbnail')->nullable();

            // --- Location Details (Merged from locations table) ---
            $table->foreignIdFor(Division::class)->constrained();
            $table->foreignIdFor(District::class)->constrained();
            $table->foreignIdFor(Upazila::class)->constrained();
            $table->foreignIdFor(Union::class)->nullable()->constrained();
            $table->string('landmark'); // e.g., Mirpur DOHS, Block C
            $table->string('address'); // Complete address for display
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // --- Rent & Cost Details (nullable) ---
            $table->unsignedInteger('rent_amount')->nullable();
            $table->enum('rent_negotiable', ['negotiable', 'fixed'])->default('negotiable');
            $table->unsignedInteger('service_charge')->nullable();
            $table->unsignedInteger('security_deposit')->nullable();
            $table->text('rent_summary')->nullable();

            // --- Additional Details ---
            $table->date('available_from');
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_spotlight')->default(false);
            $table->boolean('is_featured_showcase')->default(false);
            // এই কলামটি নির্ধারণ করবে প্রপার্টিটি হিরো স্লাইডারে যাবে কি না
            $table->boolean('is_hero_featured')->default(false);
            // প্রতিটি হিরো স্লাইডের জন্য একটি কাস্টম সাজানোর ক্রম
            $table->unsignedInteger('hero_order_column')->nullable();
            $table->text('house_rules')->nullable();

            // --- Contact Details ---
            $table->string('contact_number_primary')->unique();
            $table->string('contact_whatsapp')->unique()->nullable();

            // --- System Columns ---
            $table->unsignedBigInteger('views_count')->default(0);
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
