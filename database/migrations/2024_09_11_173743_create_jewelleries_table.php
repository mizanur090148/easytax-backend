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
        Schema::create('jewelleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->integer('closing_qty')->nullable();
            $table->integer('closing_value')->nullable();
            $table->integer('new_purchase_qty')->nullable();
            $table->integer('purchase_value')->nullable();
            $table->integer('sale_qty')->nullable();
            $table->integer('sale_value')->nullable();
            $table->integer('opening_qty')->nullable();
            $table->integer('opening_value')->nullable();
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
        Schema::dropIfExists('jewelleries');
    }
};
