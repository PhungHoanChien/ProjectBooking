<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'    => 1,
                'image_user'      => 'admin.png',
                'name' => 'Phùng Hoàn Chiến',
                'email' => 'hoanchien.04012003@gmail.com',
                'password'   => Hash::make('123'),
                'role'    => 'admin',
            ],
            [
                'id'    => 2,
                'image_user'      => 'avatar.webp',
                'name' => 'Người dùng Chiến',
                'email' => 'phungchien.04012003@gmail.com',
                'password'   => Hash::make('123'),
                'role_id'    => 'user',
            ],
        ]);
    }
}
