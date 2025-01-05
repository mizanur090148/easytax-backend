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
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->string('location_of_property')->nullable();
            $table->date('date_of_purchase')->nullable();
            $table->string('size_of_property', 30)->nullable();
            $table->integer('net_value_of_property')->nullable();
            $table->integer('renovation_deployment')->nullable();
            $table->integer('sale_of_portion')->nullable();
            $table->integer('cost_of_sale_portion')->nullable();

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
        Schema::dropIfExists('agri_non_agri_lands');
    }
};
