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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->morphs('reactable'); // Comment বা অন্য মডেলে রিঅ্যাক্ট করার জন্য
            $table->string('type'); // e.g., 'like', 'love', 'haha'
            $table->timestamps();

            // একজন ইউজার একটি আইটেমে একটি মাত্র রিঅ্যাকশন দিতে পারবে
            $table->unique(['user_id', 'reactable_id', 'reactable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
