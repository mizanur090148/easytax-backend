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
            $table->string('challan_type')->nullable();
            $table->string('challan_no')->nullable();
            $table->date('date')->nullable();
            $table->string('deposit_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('assessment_year')->nullable();
            $table->string('refund_authority')->nullable();
            $table->string('type')->default('expense_entry');
            $table->boolean('status')->default(true);
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
