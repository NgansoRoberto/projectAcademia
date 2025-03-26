<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatriculeProfesseur extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 50 random professor matricules
        for ($i = 0; $i < 50; $i++) {
            DB::table('matricules_professeur')->insert([
                'matricule' => $this->generateRandomMatricule(),
                'utilise' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    private function generateRandomMatricule(): string
    {
        return 'IugProf-' . strtoupper(Str::random(9));
    }
}
