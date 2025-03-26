<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatriculeEtudiant extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 100 random student matricules
        for ($i = 0; $i < 100; $i++) {
            DB::table('matricules_etudiant')->insert([
                'matricule' => $this->generateRandomMatricule(),
                'utilise' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateRandomMatricule(): string
    {
        // Generate a random string with 10 alphanumeric characters
        return strtoupper(Str::random(10));
    }
}
