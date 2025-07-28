<?php

use App\Models\Post;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete(); // লগইন করা ইউজারের জন্য
            $table->unsignedBigInteger('parent_id')->nullable(); // নেস্টেড কমেন্টের জন্য
            $table->string('name'); // গেস্টদের জন্য
            $table->string('phone');
            $table->string('email');
            $table->text('comment');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            // parent_id কলামটি id কলামকে রেফারেন্স করবে (একই টেবিলে)
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
