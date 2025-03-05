<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Thời trang nam',
                'description' => 'Các sản phẩm thời trang dành cho nam giới',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Thời trang nữ',
                'description' => 'Các sản phẩm thời trang dành cho nữ giới',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);        
    }
}
