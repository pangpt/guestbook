<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();


        DB::table('categories')->insert([
            ['name' => 'Uncategorized', 'created_at' => $now,  'updated_at' => $now],
        ]);


    }
}
