<?php

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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Division::class);
            $table->foreignIdFor(\App\Models\District::class);
            $table->foreignIdFor(\App\Models\Upazila::class);
            $table->foreignIdFor(\App\Models\Union::class);
            $table->string('area_name');
            $table->enum('area_type', ['urban', 'semi_urban', 'rural'])->nullable();
            $table->string('landmark');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
