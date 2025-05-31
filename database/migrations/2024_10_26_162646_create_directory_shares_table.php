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
        Schema::create('directory_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name_of_company', 100)->nullable();
            $table->string('incorporation_no', 50)->nullable();
            $table->date('incorporation_date')->nullable();
            $table->integer('closing_no_of_shares')->nullable();
            $table->integer('cost_per_share')->nullable();

            $table->integer('purchased_no_of_shares')->nullable();
            $table->integer('purchased_cost_per_share')->nullable();

            $table->integer('sold_no_of_shares')->nullable();
            $table->integer('sold_cost_per_share')->nullable();

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
        Schema::dropIfExists('directory_shares');
    }
};
