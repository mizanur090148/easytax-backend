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
        Schema::table('financial_assets', function (Blueprint $table) {
            $table->string('opening_value')->nullable();
            $table->string('new_purchase')->nullable();
            $table->string('sale')->nullable();
            $table->string('gain_or_loss')->nullable();
            $table->string('new_loan')->nullable();
            $table->string('recovered_amount')->nullable();
            $table->string('fdr_no')->nullable();
            $table->string('new_fdr')->nullable();
            $table->string('encashment')->nullable();
            $table->string('net_interest')->nullable();
            $table->string('new_contribution')->nullable();
            $table->string('net_income')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financial_assets', function (Blueprint $table) {
            $table->dropColumn('opening_value');
            $table->dropColumn('new_purchase');
            $table->dropColumn('sale');
            $table->dropColumn('gain_or_loss');
            $table->dropColumn('new_loan');
            $table->dropColumn('recovered_amount');
            $table->dropColumn('fdr_no');
            $table->dropColumn('new_fdr');
            $table->dropColumn('encashment');
            $table->dropColumn('net_interest');
            $table->dropColumn('new_contribution');
            $table->dropColumn('net_income');
        });
    }
};
