<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GhopoCadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NO' => 1,
                'Jarak' => 3.2, 
                'latitude' => -6.88402,  // Latitude
                'longitude' => 111.9278, // Longitude
                'No_ID' => '456000', 
                'Komoditi' => "Cad Batugamping",
                'Lokasi_IUP' => "IUP Temandang",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' => 180290209, 
                'Catatan' => "Luas 752,8 Hektar. Produksi 16,236,480 ton/tahun.",
                'Status_Penyelidikan' => "Operasi Produksi",
                'Acuan' => "RKAB Tahun 2022, PT Semen Indonesia (Persero) Tbk Kuari Batugamping Temandang",
                'Kabupaten' => "Tuban",
                'Kecamatan' => "Merakurak, Kerek",
                'Luas_ha' => 752.8,  
                'Masa_Berlaku_IUP' => Carbon::create(2029, 5, 14),
                'Masa_Berlaku_PPKH' => Carbon::create(2029, 5, 14),
            ],
            [
                'NO' => 2,
                'Jarak' => 8.7, 
                'latitude' => -6.89834,  // Latitude
                'longitude' => 111.92986, // Longitude
                'No_ID' => '252700', 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Merakurak",
                'Tipe_SD_Cadangan' => "SD Tertunjuk",
                'SD_Cadangan_ton' => 89642000, 
                'Catatan' => "CaO rata-rata: 51,54%",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "652/Ga/88",
                'Kabupaten' => "Tuban",
                'Kecamatan' => "Kerek",
                'Luas_ha' => 0,
                'Masa_Berlaku_IUP' => null,
                'Masa_Berlaku_PPKH' => null,
            ],
            [
                'NO' => 3,
                'Jarak' => 9.3, 
                'latitude' => -6.90992,  // Latitude
                'longitude' => 111.87768, // Longitude
                'No_ID' => '456100', 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Kerek",
                'Tipe_SD_Cadangan' => "SD Tertunjuk",
                'SD_Cadangan_ton' => 535773000, 
                'Catatan' => "Baik",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "Neraca",
                'Kabupaten' => "Tuban",
                'Kecamatan' => "Kerek",
                'Luas_ha' => 0,
                'Masa_Berlaku_IUP' =>null,
                'Masa_Berlaku_PPKH' =>null,
            ],
        ];

        DB::table('ghopo_cad_bb')->insert($data);
    }
}
