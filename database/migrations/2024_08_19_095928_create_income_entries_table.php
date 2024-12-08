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
        Schema::create('income_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->json('salary_income')->nullable();
            $table->json('rental_income')->nullable();
            $table->json('agricultural_income')->nullable();
            $table->json('business_income')->nullable();
            $table->json('capital_gain')->nullable();
            $table->json('financial_assets_income')->nullable();
            $table->json('partnership_firm_income')->nullable();
            $table->json('income_from_minor_spouse')->nullable();
            $table->json('foreign_income')->nullable();
            $table->json('other_sources_of_income')->nullable();
            $table->json('gift_reward')->nullable();
            $table->string('year', 4)->nullable();
            $table->boolean('past_return')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_entries');
    }
};
