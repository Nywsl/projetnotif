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
        Schema::create('modalite_niveaux', function (Blueprint $table) {
            $table->id();
            $table->date('echeance');
            $table->integer('montant');
            $table->unsignedBigInteger('niveaux_id');
            $table->foreign('niveaux_id')->references('id')->on('niveaux')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modalite_niveaux');
    }
};
