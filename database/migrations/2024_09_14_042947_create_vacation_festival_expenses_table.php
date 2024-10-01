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
        Schema::create('vacation_festival_expenses', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->float('local_travel')->nullable();
            $table->float('foreign_travel')->nullable();
            $table->float('other_entertainment')->nullable();

            $table->float('religious_festive_expense')->nullable();
            $table->float('anniversary_expense')->nullable();
            $table->float('birthday_expense')->nullable();

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
        Schema::dropIfExists('vacation_festival_expenses');
    }
};
