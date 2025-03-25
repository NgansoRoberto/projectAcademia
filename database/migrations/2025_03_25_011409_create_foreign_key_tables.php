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
        // Add foreign keys to admins table
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to etudiants table
        Schema::table('etudiants', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            
            $table->foreign('filiere_id')->references('id')->on('filieres')
                ->onDelete('set null')
                ->onUpdate('restrict');
            
            $table->foreign('groupe_id')->references('id')->on('groupes')
                ->onDelete('set null')
                ->onUpdate('restrict');
        });

        // Add foreign keys to professeurs table
        Schema::table('professeurs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to cours table
        Schema::table('cours', function (Blueprint $table) {
            $table->foreign('professeur_id')->references('id')->on('professeurs')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to publications table
        Schema::table('publications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to notifications table
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to absences table
        Schema::table('absences', function (Blueprint $table) {
            $table->foreign('etudiant_id')->references('id')->on('etudiants')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            
            $table->foreign('cours_id')->references('id')->on('cours')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            
            $table->foreign('professeur_id')->references('id')->on('professeurs')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to fichiers table
        Schema::table('fichiers', function (Blueprint $table) {
            $table->foreign('cours_id')->references('id')->on('cours')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to groupes table
        Schema::table('groupes', function (Blueprint $table) {
            $table->foreign('filiere_id')->references('id')->on('filieres')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to messages table
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            
            $table->foreign('groupe_discussion_id')->references('id')->on('groupes_discussion')
                ->onDelete('set null')
                ->onUpdate('restrict');
        });

        // Add foreign keys to groupes_discussion table
        Schema::table('groupes_discussion', function (Blueprint $table) {
            $table->foreign('createur_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });

        // Add foreign keys to membres_groupe table
        Schema::table('membres_groupe', function (Blueprint $table) {
            $table->foreign('groupe_id')->references('id')->on('groupes_discussion')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign keys from admins table
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Drop foreign keys from etudiants table
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['filiere_id']);
            $table->dropForeign(['groupe_id']);
        });

        // Drop foreign keys from professeurs table
        Schema::table('professeurs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Drop foreign keys from cours table
        Schema::table('cours', function (Blueprint $table) {
            $table->dropForeign(['professeur_id']);
        });

        // Drop foreign keys from publications table
        Schema::table('publications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Drop foreign keys from notifications table
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Drop foreign keys from absences table
        Schema::table('absences', function (Blueprint $table) {
            $table->dropForeign(['etudiant_id']);
            $table->dropForeign(['cours_id']);
            $table->dropForeign(['professeur_id']);
        });

        // Drop foreign keys from fichiers table
        Schema::table('fichiers', function (Blueprint $table) {
            $table->dropForeign(['cours_id']);
        });

        // Drop foreign keys from groupes table
        Schema::table('groupes', function (Blueprint $table) {
            $table->dropForeign(['filiere_id']);
        });

        // Drop foreign keys from messages table
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['expediteur_id']);
            $table->dropForeign(['groupe_discussion_id']);
        });

        // Drop foreign keys from groupes_discussion table
        Schema::table('groupes_discussion', function (Blueprint $table) {
            $table->dropForeign(['createur_id']);
        });

        // Drop foreign keys from membres_groupe table
        Schema::table('membres_groupe', function (Blueprint $table) {
            $table->dropForeign(['groupe_id']);
            $table->dropForeign(['utilisateur_id']);
        });
    }
};
