<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Ilham Santoso',
            'username' => 'admin',
            'password' => Hash::make('superadmin'),
            'email' => 'ilhamsanns@gmail.com',
            'jabatan' => 'IT Staff',
            'departemen' => 'Teknologi Informasi',
            'total_cuti' => 12,
            'cuti_diambil' => 0,
            'sisa_cuti' => 12,
            'role' => 'ADMIN',
            'status' => 'Y'
        ]);
    }
}
