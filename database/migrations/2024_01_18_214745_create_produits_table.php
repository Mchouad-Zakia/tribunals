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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stockes_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('numserie')->nullable();
            $table->string('numinv');
            $table->string('Tribunal');
            $table->boolean('fondus')->default(false);
            $table->integer('nbr_maintenance')->default(0);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
