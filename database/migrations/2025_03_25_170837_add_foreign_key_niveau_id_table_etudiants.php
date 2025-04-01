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
        Schema::table('etudiants', function (Blueprint $table) {
            $table->unsignedBigInteger('niveau_id')->nullable()->after('groupe_id');

            $table->foreign('niveau_id')->references('id')->on('niveaux_academiques')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etudiants', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['niveau_id']);

            // Drop column
            $table->dropColumn('niveau_id');
        });
    }
};
