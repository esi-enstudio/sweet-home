<?php

use App\Models\District;
use App\Models\Division;
use App\Models\Property;
use App\Models\Union;
use App\Models\Upazila;
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
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Division::class);
            $table->foreignIdFor(District::class);
            $table->foreignIdFor(Upazila::class);
            $table->foreignIdFor(Union::class);
            $table->string('area_name');
            $table->string('landmark')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('area_type', ['urban', 'semi_urban', 'rural'])->nullable();
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
