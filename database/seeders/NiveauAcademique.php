<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauAcademique extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = [
            'niveau 1',
            'niveau 2-BTS',
            'niveau 3-License',
            'niveau 4-Master1',
            'niveau 5-Master2',
        ];

        foreach ($niveaux as $niveau) {
            DB::table('niveaux_academiques')->insert([
                'nom' => $niveau,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
