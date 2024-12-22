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
        Schema::create('expense_tax_paid_refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('head_of_income')->nullable();
            $table->string('challan_type')->nullable();
            $table->string('challan_no')->nullable();
            $table->date('date')->nullable();
            $table->string('deposit_type')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('assessment_year')->nullable();
            $table->string('refund_authority')->nullable();
            $table->enum('type', ['tax_deduction_at_sources', 'advance_payment_of_tax', 'tax_paid_on_past_return', 'tax_refund_on_past_return'])->default('tax_deduction_at_sources');
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_tax_paid_refunds');
    }
};
