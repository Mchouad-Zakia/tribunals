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
        Schema::create('stockes', function (Blueprint $table) {
            $table->id();
            $table->integer('qt');
            $table->foreignId('sous_categories_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('qtE');
            $table->string('model');
            $table->string('name');
            $table->decimal('prix');
            $table->integer('garantie');
        $table->foreignId('achats_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockes');
    }
};
