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
        Schema::create('asset_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->json('business_assets')->nullable();
            $table->json('partnership_business')->nullable();
            $table->json('director_share_in_limited_company')->nullable();
            $table->json('non_agriculture_land')->nullable();
            $table->json('agriculture_land')->nullable();
            $table->json('financial_assets')->nullable();
            $table->json('motor_vehicles')->nullable();
            $table->json('jewellery')->nullable();
            $table->json('furniture_equipment')->nullable();
            $table->json('other_asset')->nullable();
            $table->json('asset_outside_bd')->nullable();
            $table->json('cash_fund')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_entries');
    }
};
