<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufactureSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('manufactures')->insert([
            'manu_id'   => 18,
            'manu_name' => 'mcdonalds.vn',
        ]);
    }
}

