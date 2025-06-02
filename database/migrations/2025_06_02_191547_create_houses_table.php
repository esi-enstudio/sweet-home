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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignIdFor(User::class);
            $table->string('title');
            $table->string('location');
            $table->string('division');
            $table->string('district');
            $table->string('thana');
            $table->decimal('rent', 8, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['flat', 'duplex', 'apartment', 'house', 'tin-shade', 'semi-house']);
            $table->enum('status', ['available', 'booked'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
