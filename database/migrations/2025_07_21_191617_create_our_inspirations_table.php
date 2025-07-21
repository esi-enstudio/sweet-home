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
        Schema::create('our_inspirations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // e.g., "Real Estate Broker"
            $table->string('photo')->nullable();
            $table->json('social_links')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->unsignedInteger('order_column')->default(0); // <-- আপনার চাওয়া অর্ডার কলাম
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_inspirations');
    }
};
