<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = [
            'ADMIN_CAMPUS_2025',
            'DIRECTION_2025_KEY',
        ];

        foreach ($niveaux as $niveau) {
            DB::table('code_admin')->insert([
                'utilise' => false,
                'code' => $niveau,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
