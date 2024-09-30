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
        Schema::create('investment_credit_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('type', ['insurance', 'deposit'])->default('insurance');
            $table->string('policy_number')->nullable();
            $table->float('insured_amount')->nullable();
            $table->float('current_year_amount')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->float('paid_amount')->nullable();
            $table->float('allowable_limit')->nullable();
            $table->float('total')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_credit_savings');
    }
};
