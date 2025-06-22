<?php

use App\Models\Property;
use App\Models\SpaceOverview;
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
        Schema::create('space_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('icon_class')->nullable();
            $table->timestamps();
        });

        Schema::create('property_space_overview', function (Blueprint $table) {
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(SpaceOverview::class)->constrained()->cascadeOnDelete();
            $table->string('dimensions')->nullable(); // e.g., "20 x 16 sq feet"
            $table->primary(['property_id', 'space_overview_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('space_overviews');
    }
};
