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
        Schema::create('rental_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->string('contract_duration')->nullable(); // উদাহরণ: "ন্যূনতম ১ বছরের চুক্তি প্রয়োজন"
            $table->string('contract_breach_terms')->nullable(); // উদাহরণ: "চুক্তি ভঙ্গ করলে ডিপোজিট ফেরতযোগ্য নয়"
            $table->string('tenant_eligibility')->nullable(); // উদাহরণ: "সাবলেট দিতে পারবে, বাড়িওয়ালার অনুমতি সাপেক্ষে"
            $table->string('identity_verification')->nullable(); // উদাহরণ: "NID ও কর্মস্থলের প্রমাণপত্র জমা দিতে হবে"
            $table->string('background_check')->nullable(); // উদাহরণ: "পূর্ববর্তী বাড়িওয়ালার রেফারেন্স প্রয়োজন"
            $table->string('payment_schedule')->nullable(); // উদাহরণ: "ভাড়া প্রতি মাসের ১-৭ তারিখের মধ্যে দিতে হবে"
            $table->json('payment_methods')->nullable(); // উদাহরণ: "বিকাশ, নগদ, রকেট, ব্যাংক ট্রান্সফার, চেক, ক্যাশ"
            $table->text('house_usage_rules')->nullable(); // উদাহরণ: "দেয়ালে পেইন্টিং, ড্রিলিং বাড়িওয়ালার অনুমতি সাপেক্ষে"
            $table->text('maintenance_responsibility')->nullable(); // উদাহরণ: "ছোট মেরামত ভাড়াটিয়ার, বড় মেরামত বাড়িওয়ালার"
            $table->text('damage_liability')->nullable(); // উদাহরণ: "চুক্তি শেষে যৌথ পরিদর্শন। ক্ষতির জন্য ডিপোজিট থেকে কাটা হবে"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_terms');
    }
};
