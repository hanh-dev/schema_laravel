<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product2;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gọi Factory để tạo 100 sản phẩm
        Product2::factory()->count(100)->create();
    }
}

