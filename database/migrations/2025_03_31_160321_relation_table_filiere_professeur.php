<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('filieres_professeur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filiere_id')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('prof_id')->nullable()->onDelete('cascade');
            $table->timestamps();
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('prof_id')->references('id')->on('professeurs')->onDelete('set null')->onUpdate('cascade');
            $table->unique(['filiere_id', 'prof_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres_professeur');
    }
};
