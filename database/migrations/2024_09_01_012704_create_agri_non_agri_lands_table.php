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
        Schema::create('agri_non_agri_lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('type', ['agri', 'non-agri'])->default('non-agri');
            $table->enum('property_type', ['land', 'building', 'apartment', 'land_share', 'house'])->nullable()->default(null);
            $table->string('location_of_property')->nullable();
            $table->date('date_of_purchase')->nullable();
            $table->string('size_of_property', 30)->nullable();
            $table->string('net_value_of_property', 30)->nullable();
            $table->string('renovation_deployment', 30)->nullable();
            $table->float('sale_of_portion')->nullable();
            $table->float('cost_of_sale_portion')->nullable();
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
        Schema::dropIfExists('agri_non_agri_lands');
    }
};
