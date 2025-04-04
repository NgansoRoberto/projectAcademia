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
        Schema::table('cours', function (Blueprint $table) {
            $table->unsignedBigInteger('filiere_id')->nullable()->after('professeur_id');
            $table->enum('statut', ['prevu', 'en cours', 'terminée'])->default('prevu');
            $table->enum('type', ['présentiel', 'en ligne'])->default('présentiel');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
