<?php

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
            $table->string('slug')->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->text('title');
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->text('environment')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('area_type', ['urban', 'semi_urban', 'rural'])->nullable();
            $table->enum('property_type', ['tin_shed', 'semi_pucca', 'flat', 'duplex'])->nullable();
            $table->enum('tenant_type', ['small_family', 'large_family', 'bachelor', 'sublet'])->nullable();
            $table->unsignedInteger('total_area')->nullable();
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->unsignedTinyInteger('attached_bathroom')->nullable();
            $table->unsignedTinyInteger('shared_bathroom')->nullable();
            $table->unsignedTinyInteger('dining_rooms')->nullable();
            $table->unsignedTinyInteger('living_rooms')->nullable();
            $table->unsignedTinyInteger('study_rooms')->nullable();
            $table->unsignedTinyInteger('store_rooms')->nullable();
            $table->unsignedTinyInteger('balconies')->nullable();
            $table->json('floor_plan')->nullable();
            $table->json('floor_number')->nullable();
            $table->enum('flooring', ['tiles', 'marble', 'wood', 'cement'])->nullable();
            $table->enum('walls', ['plaster', 'paint', 'wallpaper'])->nullable();
            $table->enum('windows', ['aluminum', 'glass', 'wood', 'iron'])->nullable();
            $table->enum('condition', ['new', 'old', 'very_old'])->nullable();
            $table->enum('facing', ['north', 'south', 'east', 'west'])->nullable();
            $table->date('available_from')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->boolean('is_urgent')->nullable();
            $table->enum('listing_type', ['rent','buy','sell'])->nullable();
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
