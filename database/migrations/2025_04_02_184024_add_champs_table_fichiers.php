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
        Schema::table('fichiers', function (Blueprint $table) {
            $table->unsignedBigInteger('seances_id')->nullable()->after('cours_id');
            $table->foreign('seances_id')->references('id')->on('seances_cours')->onDelete('cascade'); 
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
