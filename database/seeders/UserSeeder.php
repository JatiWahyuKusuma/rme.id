<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no' => 1,
                'level_id' => 1,
                'nama' => 'Superadmin1',
                'email' => 'superadmin1@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'no' => 2,
                'level_id' => 2,
                'nama' => 'Admin GHOPO',
                'email' => 'adminghopo@gmail.com',
                'password' => Hash::make('12345'),
            ],
            [
                'no' => 3,
                'level_id' => 2,
                'nama' => 'Admin SG',
                'email' => 'adminsg@gmail.com',
                'password' => Hash::make('54321'),
            ],

        ];

        DB::table('m_user')->insert($data);
    }  
}
