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
        Schema::create('modaliteetudiants', function (Blueprint $table) {
            $table->id();
            $table->date('echeance');
            $table->integer('montant');
            $table->boolean('sms_envoye');
            $table->date('date_sms');
            $table->enum('etat', ['en_cours','paye','annule'])->default('en_cours');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modaliteetudiants');
    }
};
