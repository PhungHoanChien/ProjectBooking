<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('protypes')->insert([
            ['type_id' => 1, 'type_name' => 'Bánh Burger'],
            ['type_id' => 2, 'type_name' => 'Gà rán'],
            ['type_id' => 3, 'type_name' => 'Nước và tráng miệng'],
        ]);
    }
}
