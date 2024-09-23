<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SGVenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NO' => 1,
                'Jarak' => 185.0, 
                'latitude' => -7.07847,  // Latitude
                'longitude' => 112.62756, // Longitude
                'Vendor' => "Freeport",
                'Komoditi' => "Copper Slag",
                'Desa' => "Manyarejo",
                'Kecamatan' => "Manyar",
                'Kabupaten' => "Gresik",
                'kap_ton_thn' =>  900,000, 
                'Konsumsi_ton_thn' => "Real: 2022: 34.697 ton, 2023: 22.105 ton, Jan-Mei 2024: 12.019 tonRenc: Jun-Des 2024: 12.000 ton, 2025: 36.000 ton, 2026: 36.000 ton",
            ],
            [
                'NO' => 2,
                'Jarak' => 104.0, 
                'latitude' => -7.14841,  // Latitude
                'longitude' => 112.63947, // Longitude
                'Vendor' => "Petrokimia",
                'Komoditi' => "Purified Gypsum",
                'Desa' => "Karangpoh",
                'Kecamatan' => "Gresik",
                'Kabupaten' => "Gresik",
                'kap_ton_thn' =>1,200,000, 
                'Konsumsi_ton_thn' => "Real: 2022: 31.356 ton, 2023: 55.988 ton, Jan-Mei 2024: 17.165 ton Renc: Jun-Des 2024: 20.000 ton, 2025: 42.000 ton, 2026: 42.000 ton",
            ],
        ];
        DB::table('sg_ven_bb')->insert($data);
    }
}
