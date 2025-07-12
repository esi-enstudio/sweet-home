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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->string('path')->nullable(); // File a path in storage
            $table->string('video_url')->nullable();
            $table->enum('type', ['gallery', 'video','hero','showcase','spotlight']);
            $table->string('caption')->nullable();
            $table->unsignedSmallInteger('order_column')->default(0); // ছবি সাজানোর জন্য
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
