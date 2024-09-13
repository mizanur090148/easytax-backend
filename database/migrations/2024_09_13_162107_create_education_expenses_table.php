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
        Schema::create('education_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->float('tution_fees')->nullable();
            $table->float('exam_fees')->nullable();
            $table->float('private_tutor_salary')->nullable();

            $table->float('books_periodicals')->nullable();
            $table->float('uniform_shoes')->nullable();
            
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
        Schema::dropIfExists('education_expenses');
    }
};
