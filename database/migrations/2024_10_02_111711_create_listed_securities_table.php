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
        Schema::create('listed_securities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('type', ['ipo', 'secondary', 'investment'])->default('ipo');
            $table->string('brokarage_name')->nullable();
            $table->string('bo_id_no')->nullable();
            $table->float('net_investment')->nullable();
            $table->float('total')->nullable();
            
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
        Schema::dropIfExists('listed_securities');
    }
};
