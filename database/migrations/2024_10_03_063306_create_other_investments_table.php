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
        Schema::create('other_investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('type', ['zakat', 'nbr'])->default('zakat');
            $table->string('name_of_zakat_fund')->nullable();
            $table->string('account_no')->nullable();
            $table->string('name_of_fund')->nullable();
            $table->string('ref_no')->nullable();
            $table->integer('contribution_amount')->nullable();
            $table->integer('total')->nullable();
            
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
        Schema::dropIfExists('other_investments');
    }
};
