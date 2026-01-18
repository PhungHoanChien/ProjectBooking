<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Burger Bò phô mai đặc biệt',
                'manu_id' => 18,
                'type_id' => 1,
                'price' => 56000,
                'pro_image' => 'products/hinh1.webp',
                'description' => 'Burger 2 lớp bò, phô-mai',
                'feature' => 1,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 53,
                'name' => 'Burger 2 lớp bò và phô-mai',
                'manu_id' => 18,
                'type_id' => 1,
                'price' => 66000,
                'pro_image' => 'products/hinh2.webp',
                'description' => 'Burger 2 lớp bò và phô-mai.',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 54,
                'name' => 'Burger Bò miếng lớn phô-mai',
                'manu_id' => 18,
                'type_id' => 1,
                'price' => 79000,
                'pro_image' => 'products/hinh3.webp',
                'description' => 'Burger bò miếng lớn và phô-mai',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 55,
                'name' => 'Burger Big Mac',
                'manu_id' => 18,
                'type_id' => 1,
                'price' => 76000,
                'pro_image' => 'products/hinh4.webp',
                'description' => 'Burger 2 lớp bò, phô-mai, rau tươi và sốt Big Mac.',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 3,
                'name' => 'Burger Bò Hoàng Gia Đặc Biệt',
                'manu_id' => 18,
                'type_id' => 1,
                'price' => 89000,
                'pro_image' => 'products/hinh5.webp',
                'description' => '',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],

            // ===== GÀ RÁN =====
            [
                'id' => 5,
                'name' => '20 miếng Gà Viên Vui Vẻ',
                'manu_id' => 18,
                'type_id' => 2,
                'price' => 121000,
                'pro_image' => 'products/hinh6.jpg',
                'description' => 'Những món ăn có thể chia sẻ cùng bạn bè',
                'feature' => 1,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 7,
                'name' => '3 miếng Cánh Gà McWings™',
                'manu_id' => 18,
                'type_id' => 2,
                'price' => 69000,
                'pro_image' => 'products/hinh7.png',
                'description' => 'Những món ăn có thể chia sẻ cùng bạn bè',
                'feature' => 1,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],

            // ===== NƯỚC & TRÁNG MIỆNG =====
            [
                'id' => 21,
                'name' => 'Fanta®',
                'manu_id' => 18,
                'type_id' => 3,
                'price' => 22000,
                'pro_image' => 'products/hinh14.png',
                'description' => '',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
            [
                'id' => 60,
                'name' => 'Kem McSundae™ xốt Dâu',
                'manu_id' => 18,
                'type_id' => 3,
                'price' => 29000,
                'pro_image' => 'products/hinh21.png',
                'description' => '',
                'feature' => 0,
                'created_at' => '2025-03-11 08:00:00',
                'updated_at' => '2025-03-11 08:00:00',
            ],
        ]);
    }
}
