<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Filieres extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filires = [
            'ACT1J',
            'ACT1S',
            'ACT2J',
            'ACT2S',
            'MIF1J',
            'MIF1S',
            'MIF2J',
            'MIF2S',
            'MDS1J',
            'MDS1S',
            'MDS2J',
            'MDS2S',
            'GSI1J',
            'GSI1S',
            'GSI2J',
            'GSI2S',
            'GLT1J',
            'GLT1S',
            'GLT2J',
            'GLT2S',
            'GRH1J',
            'GRH1S',
            'GRH2J',
            'GRH2S',
            'BQF1J',
            'BQF1S',
            'BQF2J',
            'BQF2S',
            'CGE1J',
            'CGE1S',
            'CGE2J',
            'CGE2S',
            'AMA1J',
            'AMA1S',
            'AMA2J',
            'AMA2S',
            'GPR1J',
            'GPR1S',
            'GPR2J',
            'GPR2S',
            'ASS1J',
            'ASS1S',
            'ASS2J',
            'ASS2S',
            'MCV1J',
            'MCV1S',
            'MCV2J',
            'MCV2S',
            'CIN1J',
            'CIN1S',
            'CIN2J',
            'CIN2S',
            'MEI1J',
            'MEI1S',
            'MEI2J',
            'MEI2S',
            'MSE1J',
            'MSE1S',
            'MSE2J',
            'MSE2S',
            'ELT1J',
            'ELT1S',
            'ELT2J',
            'ELT2S',
            'TPU1J',
            'TPU1S',
            'TPU2J',
            'TPU2S',
            'BAT1J',
            'BAT1S',
            'BAT2J',
            'BAT2S',
            'SFM1J',
            'SFM1S',
            'SFM2J',
            'SFM2S',
            'KIN1J',
            'KIN1S',
            'KIN2J',
            'KIN2S',
            'SIN1J',
            'SIN1S',
            'SIN2J',
            'SIN2S',
            'ODO1J',
            'ODO1S',
            'ODO2J',
            'ODO2S',
            'TLB1J',
            'TLB1S',
            'TLB2J',
            'TLB2S',
            'IMM1J',
            'IMM1S',
            'IMM2J',
            'IMM2S',
            'DTF1J',
            'DTF1S',
            'DTF2J',
            'DTF2S',
            'GFI1J',
            'GFI1S',
            'GFI2J',
            'GFI2S',
            'DOT1J',
            'DOT1S',
            'DOT2J',
            'DOT2S',
            'JOU1J',
            'JOU1S',
            'JOU2J',
            'JOU2S',
            'COM1J',
            'COM1S',
            'COM2J',
            'COM2S',
            'CMN1J',
            'CMN1S',
            'CMN2J',
            'CMN2S',
            'FCL1J',
            'FCL1S',
            'FCL2J',
            'FCL2S',
            'MIP1J',
            'MIP1S',
            'MIP2J',
            'MIP2S',
            'MKA1J',
            'MKA1S',
            'MKA2J',
            'MKA2S',
            'MAV1J',
            'MAV1S',
            'MAV2J',
            'MAV2S',
            'IGL1J',
            'IGL1S',
            'IGL2J',
            'IGL2S',
            'IIA1J',
            'IIA1S',
            'IIA2J',
            'IIA2S',
            'MSI1J',
            'MSI1S',
            'MSI2J',
            'MSI2S',
            'TEL1J',
            'TEL1S',
            'TEL2J',
            'TEL2S',
            'RES1J',
            'RES1S',
            'RES2J',
            'RES2S',
        ];

        foreach ($filires as $filire) {
            DB::table('filieres')->insert([
                'nom' => $filire,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
