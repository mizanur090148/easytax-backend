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
        Schema::create('motor_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('capacity_id')->nullable();
            $table->string('capacity', 30)->nullable();
            $table->string('brand', 30)->nullable();
            $table->string('registration_no', 50)->nullable();
            $table->integer('cost_with_registration')->nullable();
            $table->integer('cost_of_sale')->nullable();
            $table->integer('closing_cost')->nullable();

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
        Schema::dropIfExists('motor_vehicles');
    }
};
