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
        Schema::create('seances_cours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cours_id')->constrained()->onDelete('cascade');
            $table->integer('numero_seance');
            $table->date('date_seance');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->enum('statut', ['planifiée', 'en cours', 'terminée'])->default('planifiée');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances_cours');
    }
};
