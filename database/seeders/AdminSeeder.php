<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no' => 1,
                'level_id' => 2,
                'nama' => 'Admin GHOPO',
                'email' => 'adminghopo@gmail.com',
                'opco' =>'GHOPO Tuban',
                'password' => Hash::make('adminghopo123'),
            ],
            [
                'no' => 2,
                'level_id' => 2,
                'nama' => 'Admin SG',
                'email' => 'adminsg@gmail.com',
                'opco' =>'SG Rembang',
                'password' => Hash::make('adminsg123'),
            ],

        ];

        DB::table('m_admin')->insert($data);
    }
}
