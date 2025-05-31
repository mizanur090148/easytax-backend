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
        Schema::create('financial_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('type', ['shares','savings','loan_given','fixed_deposit','pf_or_other','other'])->default('shares');
            $table->string('account_no', 30)->nullable();
            $table->string('name_of_person', 30)->nullable();
            $table->string('etin_no', 20)->nullable();
            $table->float('closing_amount')->nullable();
            $table->string('asset_type')->nullable();
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

            $table->string('year', 9)->nullable();
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
        Schema::dropIfExists('financial_assets');
    }
};
