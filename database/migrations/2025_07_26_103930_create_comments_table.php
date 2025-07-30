<?php

use App\Models\Comment;
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
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete(); // লগইন করা ইউজার আবশ্যক

            // --- এটিই নেস্টেড কমেন্টের মূল ভিত্তি ---
            // parent_id কলামটি অন্য একটি কমেন্টের id-কে নির্দেশ করবে
            $table->foreignIdFor(Comment::class, 'parent_id')
                ->nullable()
                ->constrained('comments')
                ->cascadeOnDelete();

            $table->text('comment');
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
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
