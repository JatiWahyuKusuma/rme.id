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
                'Jarak' => 9.8,
                'latitude' => -6.86877,
                'longitude' => 111.51146,
                'No_ID' => 360900,
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
            [
                'NO' => 2,
                'Jarak' =>  5.1 , 
                'latitude' => -6.86935,  // Latitude
                'longitude' => 111.46668, // Longitude
                'No_ID' => null, 
                'Komoditi' => "Cad Lempung",
                'Lokasi_IUP' => "IUP Kajar",
                'Tipe_SD_Cadangan' => " Cadangan Terbukti",
                'SD_Cadangan_ton' => 14983796, 
                'Catatan' => null,
                'Status_Penyelidikan' => null,
                'Acuan' => null,
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Gunem",
                'Luas_ha' => 98.9,  
                'masa_berlaku_iup' =>Carbon::create(2037, 3, 8),
                'masa_berlaku_ppkh' =>Carbon::create(2037, 3, 8),
            ],
            [
                'NO' => 3,
                'Jarak' =>   1.6, 
                'latitude' => -6.86809,  // Latitude
                'longitude' => 111.44211, // Longitude
                'No_ID' => 237900, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Kadiwono",
                'Tipe_SD_Cadangan' => "SD HIpotetik",
                'SD_Cadangan_ton' => 250000000, 
                'Catatan' => " CaO = 43,38%; MgO = 0,25% ",
                'Status_Penyelidikan' => "Survei Tinjau",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Bulu",
                'Luas_ha' =>null,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 4,
                'Jarak' => 9.8, 
                'latitude' => -6.86264,  // Latitude
                'longitude' => 111.51009, // Longitude
                'No_ID' => 238200, 
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
                'NO' => 5,
                'Jarak' => 9.8, 
                'latitude' => -6.87354,  // Latitude
                'longitude' => 111.52108, // Longitude
                'No_ID' => 238100, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tegaldowo",
                'Tipe_SD_Cadangan' => " SD Hipotetik",
                'SD_Cadangan_ton' =>250000000, 
                'Catatan' => "CaO = 52,76%; MgO = 2,27%",
                'Status_Penyelidikan' => "Survei Tinjau",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Gunem",
                'Luas_ha' => null,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 6,
                'Jarak' => 9.8, 
                'latitude' => -6.87423,  // Latitude
                'longitude' => 111.53069, // Longitude
                'No_ID' => 360500, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tegaldowo",
                'Tipe_SD_Cadangan' => "SD Terukur",
                'SD_Cadangan_ton' => 122582795, 
                'Catatan' => "Luas IUP 482 Ha",
                'Status_Penyelidikan' => "Operasi Produksi",
                'Acuan' => "PT Sinar Asia Fortuna , Lapoan Eksplorasi, 2003",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Gunem, Sale",
                'Luas_ha' => 482,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 7,
                'Jarak' => 13.6, 
                'latitude' => -6.78392,  // Latitude
                'longitude' => 111.47782, // Longitude
                'No_ID' => 238300, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Gambiran, Pamotan",
                'Tipe_SD_Cadangan' => "SD Tertunjuk",
                'SD_Cadangan_ton' => 364975000, 
                'Catatan' => "Luas sebaran = 675 Ha, medan mudah",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Pamotan",
                'Luas_ha' => 675,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 8,
                'Jarak' => 14, 
                'latitude' => -6.88264,  // Latitude
                'longitude' => 111.52616, // Longitude
                'No_ID' => 439200, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tahunan",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' => 477597, 
                'Catatan' => "Luas 3,20 Hektar",
                'Status_Penyelidikan' => null,
                'Acuan' => "CV Alam Terang Perkasa, RKAB 2022",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sale",
                'Luas_ha' => 3.2,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 9,
                'Jarak' => 14.4, 
                'latitude' => -6.87992,  // Latitude
                'longitude' => 111.5344, // Longitude
                'No_ID' => 439100, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tahunan",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' =>  309459, 
                'Catatan' => "Luas 1,36 Hektar",
                'Status_Penyelidikan' => null,
                'Acuan' => "CV Alam Mulyo Putra, RKAB 2022",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sale",
                'Luas_ha' => 1.36,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 10,
                'Jarak' => 14.4, 
                'latitude' => -6.88281,  // Latitude
                'longitude' =>  111.53491, // Longitude
                'No_ID' => 440400, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tahunan",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' => 2444955, 
                'Catatan' => "Luas 7,12 Hektar",
                'Status_Penyelidikan' => null,
                'Acuan' => "CV Bio Alam Indo, RKAB 2022",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sale",
                'Luas_ha' => 7.12,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 11,
                'Jarak' => 14, 
                'latitude' => -6.88605,  // Latitude
                'longitude' => 111.53079, // Longitude
                'No_ID' => 440300, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tahunan",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' =>  262213, 
                'Catatan' => "Luas 1,16 Hektar",
                'Status_Penyelidikan' => null,
                'Acuan' => "CV Bio Alam Indo, RKAB 2022",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sale",
                'Luas_ha' => 1.16,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 12,
                'Jarak' => 14.4, 
                'latitude' => -6.88384,  // Latitude
                'longitude' => 111.53697, // Longitude
                'No_ID' => 439500, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Tahunan",
                'Tipe_SD_Cadangan' => "Cadangan Terbukti",
                'SD_Cadangan_ton' =>   826200, 
                'Catatan' => "Luas 7,30 Hektar",
                'Status_Penyelidikan' => null,
                'Acuan' => "CV Aveido, RKAB 2022",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sale",
                'Luas_ha' => 7.3,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 13,
                'Jarak' =>  24.9, 
                'latitude' => -6.85633,  // Latitude
                'longitude' => 111.31017, // Longitude
                'No_ID' => 238000, 
                'Komoditi' => "Pot Batugamping",
                'Lokasi_IUP' => "Mlatirejo",
                'Tipe_SD_Cadangan' => " SD Tertunjuk",
                'SD_Cadangan_ton' => 364975000, 
                'Catatan' => "Luas sebaran = 3025 Ha, medan sulit",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Bulu",
                'Luas_ha' => 3025,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 14,
                'Jarak' => 15.4, 
                'latitude' => -6.95102,  // Latitude
                'longitude' => 111.41246, // Longitude
                'No_ID' => 241800, 
                'Komoditi' => "Pot Lempung",
                'Lokasi_IUP' => "Temurejo",
                'Tipe_SD_Cadangan' => " SD Tertunjuk ",
                'SD_Cadangan_ton' => 12760000, 
                'Catatan' => "Luas sebaran = 492 Ha, 3 km dari kota kecamatan",
                'Status_Penyelidikan' => "Eksplorasi Rinci",
                'Acuan' => "Neraca",
                'Kabupaten' => "Blora",
                'Kecamatan' => "Tunjungan",
                'Luas_ha' => 492,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 15,
                'Jarak' =>  19.8, 
                'latitude' => -6.75482,  // Latitude
                'longitude' =>  111.4711, // Longitude
                'No_ID' => 242800, 
                'Komoditi' => "Pot Lempung",
                'Lokasi_IUP' => "Sumberejo",
                'Tipe_SD_Cadangan' => "SD Tereka",
                'SD_Cadangan_ton' => 29230000, 
                'Catatan' => "Mutu belum diketahui",
                'Status_Penyelidikan' => "Prospeksi",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Pamotan",
                'Luas_ha' => null,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 16,
                'Jarak' => 23.0, 
                'latitude' => -6.78755,  // Latitude
                'longitude' => 111.56887, // Longitude
                'No_ID' => 242900, 
                'Komoditi' => "Pot Lempung",
                'Lokasi_IUP' => "Sambiroto",
                'Tipe_SD_Cadangan' => "SD Hipotetik",
                'SD_Cadangan_ton' => 10500000, 
                'Catatan' => null,
                'Status_Penyelidikan' => "Survey Tinjau",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Sedan",
                'Luas_ha' => null,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
            [
                'NO' => 17,
                'Jarak' => 28.9, 
                'latitude' =>-6.73900,  // Latitude
                'longitude' => 111.43539, // Longitude
                'No_ID' => 242700, 
                'Komoditi' => "Pot Lempung",
                'Lokasi_IUP' => "Jeruk",
                'Tipe_SD_Cadangan' => "SD Hipotetik",
                'SD_Cadangan_ton' => 7500000, 
                'Catatan' => null,
                'Status_Penyelidikan' => "Survey Tinjau",
                'Acuan' => "Neraca",
                'Kabupaten' => "Rembang",
                'Kecamatan' => "Pancur",
                'Luas_ha' => 492,  
                'masa_berlaku_iup' =>null,
                'masa_berlaku_ppkh' =>null,
            ],
           
        ];

        DB::table('sg_cad_bb')->insert($data);
    }
}
