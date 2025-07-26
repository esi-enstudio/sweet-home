<?php

use App\Models\PostCategory;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->comment('Author')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(PostCategory::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('featured_image');
            $table->text('excerpt')->nullable(); // সংক্ষিপ্ত বর্ণনা
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
