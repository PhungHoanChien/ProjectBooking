<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'id' => 2,
                'Sell_number' => 300,
                'created_at' => '2021-11-12 01:41:19',
                'updated_at' => '2021-11-12 01:41:19',
            ],
            [
                'id' => 3,
                'Sell_number' => 1200,
                'created_at' => '2021-11-12 01:41:19',
                'updated_at' => '2021-11-12 01:42:44',
            ],
        ]);
    }
}
