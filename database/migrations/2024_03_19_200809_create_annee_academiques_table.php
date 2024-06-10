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
        Schema::create('annee_academiques', function (Blueprint $table) {
            $table->id();
            $table->integer('debut');
            $table->integer('fin');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->enum('actif', [0, 1])->default(0);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annee_academiques');
    }
};
