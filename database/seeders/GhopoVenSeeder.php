<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GhopoVenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NO' => 1,
                'Jarak' => 110.0, 
                'latitude' => -7.07847,  // Latitude
                'longitude' => 112.62756, // Longitude
                'Vendor' => "Freeport",
                'Komoditi' => "Copper Slag",
                'Desa' => "Manyarejo",
                'Kecamatan' => "Manyar",
                'Kabupaten' => "Gresik",
                'Kap_ton_thn' =>  900000, 
                'Konsumsi_ton_thn' => "Real: 2022: 134.671 ton, 2023: 125.011 ton, Jan-Mei 2024: 64.440 ton Renc: Jun-Des 2024: 60.000 ton, 2025: 160.000 ton, 2026: 160.000 ton",
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
                'Kap_ton_thn' =>1200000, 
                'Konsumsi_ton_thn' => "Real: 2022: 139.678 ton, 2023: 185.786 ton, Jan-Mei 2024: 66.645 ton Renc: Jun-Des 2024: 90.000 ton, 2025: 161.000 ton, 2026: 161.000 ton",
            ],
        ];

        DB::table('ghopo_ven_bb')->insert($data);
    }
}
