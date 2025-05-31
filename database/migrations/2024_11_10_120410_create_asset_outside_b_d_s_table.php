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
        Schema::create('asset_outside_b_d_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name_of_asset')->nullable();
            $table->bigInteger('country_of_asset')->nullable();
            $table->bigInteger('closing_amount_in_bd')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('opening_balance')->nullable();
            $table->bigInteger('new_investment')->nullable();
            $table->bigInteger('withdrawal')->nullable();
            $table->bigInteger('closing_balance')->nullable();
            $table->boolean('past_return')->default(true);
            
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
        Schema::dropIfExists('asset_outside_b_d_s');
    }
};
