<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SGCadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NO' => 1,
                'Jarak' => 1.6, 
                'latitude' => -6.86809,  // Latitude
                'longitude' => 111.44211, // Longitude
                'No_ID' => '237900', 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Kadiwono",
                'Tipe_SD_Cadangan' => "SD Hipotetik",
                'SD_Cadangan_ton' =>  250000000, 
                'Catatan' => " CaO = 43,38%; MgO = 0,25%",
                'Status_Penyelidikan' => "Survei Tinjau",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Bulu",
                'Luas_ha' => null,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 2,
                'Jarak' => 9.8, 
                'latitude' => -6.86264,  // Latitude
                'longitude' => 111.51009, // Longitude
                'No_ID' => '238200', 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tegaldowo",
                'Tipe_SD_Cadangan' => "SD Tertunjuk",
                'SD_Cadangan_ton' => 525658000, 
                'Catatan' => "Luas sebaran = 400 Ha, medan sulit",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Gunem",
                'Luas_ha' => 400,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 3,
                'Jarak' => 9.8,
                'latitude' => -6.86877,
                'longitude' => 111.51146,
                'No_ID' => '360900',
                'Komoditi' => "Cad Batugamping",
                'Lokasi_IUP' => "IUP Tegaldowo",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' => 255331678,
                'Catatan' => "Luas sebaran 293,10 ha, kandungan rata-rata CaO 34,53%-55,85%, MgO 0,02%-24,99%, SiO2 0,01%-33,47%, Al2O3 0,01%-4,64%, dan Fe2O3 0.00%-4.88%", // Kutip seluruh catatan
                'Status_Penyelidikan' => "Operasi Produksi",
                'Acuan' => "PT Semen Indonesia, Lapoan Eksplorasi, 2016", // Hapus tanda koma di awal
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Gunem",
                'Luas_ha' => 293.1, // Hapus tanda kutip dan koma
                'masa_berlaku_iup' => Carbon::create(2037, 3, 2),
                'masa_berlaku_ppkh' => null,
            ],
        ];

        DB::table('sg_cad_bb')->insert($data);
    }
}
