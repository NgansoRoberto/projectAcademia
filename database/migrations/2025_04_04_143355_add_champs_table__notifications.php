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
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('sujet')->nullable()->after('message');
            $table->unsignedBigInteger('expediteur_id')->nullable()->after('date');
            $table->unsignedBigInteger('filiere_id')->nullable()->after('expediteur_id');
            $table->unsignedBigInteger('cours_id')->nullable()->after('filiere_id');
            $table->enum('statut', ['envoyée', 'vue', 'archivée'])->default('envoyée')->after('cours_id');
            
            $table->foreign('expediteur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
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
