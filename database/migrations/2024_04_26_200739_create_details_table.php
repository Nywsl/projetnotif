<?php

use App\Models\facture;
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
        Schema::create('details', function (Blueprint $table) {
            $table->string('facture_id');
            $table->string('modaliteetudiant_id');
            $table->unsignedBigInteger('facture_id');
            $table->unsignedBigInteger('modaliteetudiant_id');
            $table->foreign('modaliteetudiant_id')->references('id')->on('modaliteetudiants')->onDelete('cascade');
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
