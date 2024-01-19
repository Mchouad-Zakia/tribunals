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
        Schema::create('bureauses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateurs_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nom');
            $table->string('typeB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureauses');
    }
};
