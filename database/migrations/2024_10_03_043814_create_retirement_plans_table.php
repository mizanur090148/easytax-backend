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
        Schema::create('retirement_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('type', ['pf', 'self', 'employer','annuation', 'benevolent', 'insurance'])->default('pf');
            $table->string('name_of_scheme')->nullable();
            $table->string('account_no')->nullable();
            $table->integer('contribution_amount')->nullable();
            $table->integer('total')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirement_plans');
    }
};
