<?php

use App\Models\District;
use App\Models\Division;
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
        // final_migrations/xxxx_xx_xx_create_properties_table.php

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('title', 255);
            $table->text('description')->nullable();

            // --- Property Details ---
            $table->enum('property_type', ['flat', 'room', 'duplex', 'semi_pucca', 'tin_shed']);
            $table->enum('listing_type', ['rent', 'sell']);
            $table->enum('tenant_type', ['family', 'bachelor', 'student', 'any']);
            $table->unsignedInteger('total_area');
            $table->unsignedTinyInteger('bedrooms')->default(0);
            $table->unsignedTinyInteger('bathrooms')->default(0);
            $table->unsignedTinyInteger('balconies')->default(0);
            $table->string('floor_number')->nullable();
            $table->enum('facing', ['north', 'south', 'east', 'west', 'north_east', 'south_west'])->nullable();
            $table->string('thumbnail')->nullable();

            // --- Location Details (Merged from locations table) ---
            $table->foreignIdFor(Division::class)->constrained();
            $table->foreignIdFor(District::class)->constrained();
            $table->foreignIdFor(Upazila::class)->constrained();
            $table->foreignIdFor(Union::class)->nullable()->constrained();
            $table->string('area_name'); // e.g., Mirpur DOHS, Block C
            $table->string('full_address'); // Complete address for display
            $table->string('landmark')->nullable();
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
            $table->text('house_rules')->nullable();

            // --- Contact Details ---
            $table->string('contact_number_primary');
            $table->string('contact_whatsapp')->nullable();

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
