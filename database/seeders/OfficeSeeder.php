<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        $now = \Carbon\Carbon::now();

        
        DB::table('office_settings')->insert([
            [
                'nama_instansi' => 'PA Watampone',
                'phone_instansi' => '0971-2910122',
                'email_instansi' => 'pawatampone1a@gmail.com',
                'alamat_instansi' => 'Jl. Tibojong, Bone, Sulawesi Selatan',
                'website_instansi' => 'pa-watampone.go.id',
                'created_at' => $now,
                'updated_at' => $now    
            ],
        ]);
    }
}

    
