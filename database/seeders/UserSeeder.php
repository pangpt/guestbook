<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        $now = \Carbon\Carbon::now();

        
        DB::table('users')->insert([
            [
                'name' => 'Admin Utama',
                'username' => 'admin',
                'nip' => '000000000000',
                'jabatan' => 'Kasubag Pegawaian',
                'nomor_telepon' => '082199999',
                'role' => 'admin',
                'password' => bcrypt('password'),
                'created_at' => $now,
                'updated_at' => $now    
            ],
            [
                'name' => 'Petugas 1',
                'username' => 'petugas',
                'nip' => '1111111111',
                'jabatan' => 'Kasubag Pegawaian',
                'nomor_telepon' => '082188229',
                'role' => 'petugas',
                'password' => bcrypt('password'),
                'created_at' => $now,
                'updated_at' => $now     
            ],
        ]);
    }
}

    
