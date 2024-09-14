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
        Schema::create('liabilities_entries', function (Blueprint $table) {
            $table->id();
            // institutional liabilities
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('type_of_liabilities_entry')->nullable();
            $table->string('bank_fi_name')->nullable(); // Bank/FI Name
            $table->string('account_no')->nullable(); // A/C No
            $table->decimal('opening', 15, 2)->nullable(); // Opening
            $table->decimal('new_loan', 15, 2)->nullable(); // New Loan
            $table->decimal('principal_paid', 15, 2)->nullable(); // Principal Paid
            $table->decimal('interest_paid', 15, 2)->nullable(); // Invest Paid
            $table->decimal('closing', 15, 2)->nullable(); // Closing
            $table->decimal('total_principal', 15, 2)->nullable(); // Total Principal
            $table->decimal('total_interest', 15, 2)->nullable(); // Total Interest
            // non institutional liabilities
            $table->string('name_of_person')->nullable(); // Name Of Person
            $table->string('etin_no')->nullable(); // ETIN No
            // other liabilities
            $table->string('name_of_loan')->nullable(); // Name Of Loan
            $table->string('type')->nullable(); // Type of Loan
            $table->decimal('total_closing', 15, 2)->nullable(); // Total Closing
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liabilities_entries');
    }
};
