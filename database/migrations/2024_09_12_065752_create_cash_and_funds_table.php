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
        Schema::create('cash_and_funds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('type', ['cash_at_bank', 'other_cash', 'cash_in_hand'])->nullable();
            $table->string('ac_type', 20)->nullable();
            $table->string('type_of_fund', 20)->nullable();
            $table->string('account_no', 30)->nullable();
            $table->string('bank_name', 60)->nullable();
            $table->float('closing_balance')->nullable();
            $table->float('cash_in_hand')->nullable();
           
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
        Schema::dropIfExists('cash_and_funds');
    }
};
