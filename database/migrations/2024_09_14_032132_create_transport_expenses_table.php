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
        Schema::create('transport_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->boolean('has_car')->default(false);
            $table->float('conveyance_payments')->nullable();
            $table->float('fuel_cost')->nullable();
            $table->float('repair_maintenance')->nullable();
            $table->float('fitness_renewals')->nullable();
            $table->float('driver_salary')->nullable();
            $table->float('garage_rent')->nullable();
            $table->float('ait_paid_on_car_renewal')->nullable();

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
        Schema::dropIfExists('transport_expenses');
    }
};
