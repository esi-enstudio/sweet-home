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
        Schema::create('rent_and_additional_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('monthly_rent')->nullable(); // e.g. 20000
            $table->json('rent_includes')->nullable(); // e.g. "ইউটিলিটি বিল, সার্ভিস চার্জ"
            $table->string('rent_increase_possibility')->nullable(); // e.g. "বার্ষিক ৫% বৃদ্ধি", or "সম্ভাবনা নাই"
            $table->enum('is_negotiable', ['negotiable', 'fixed'])->default('negotiable');
            $table->unsignedInteger('water_bill')->nullable(); // e.g. ২০০ / নাই
            $table->unsignedInteger('gas_bill')->nullable();
            $table->unsignedInteger('electricity_bill')->nullable();
            $table->unsignedInteger('service_charge')->nullable();
            $table->unsignedInteger('lift_charge')->nullable();
            $table->unsignedInteger('generator_charge')->nullable();
            $table->unsignedInteger('parking_fee')->nullable(); // পার্কিং ফি (গাড়ি/বাইক - অপশনাল)
            $table->unsignedTinyInteger('advance_rent_months')->nullable(); // কত মাসের অগ্রিম
            $table->enum('advance_payment_terms', ['refundable', 'non-refundable'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_and_additional_costs');
    }
};
