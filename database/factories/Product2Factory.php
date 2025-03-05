<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product2;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product2>
 */
class Product2Factory extends Factory
{
    protected $model = Product2::class;

    /**
     * Định nghĩa dữ liệu giả cho model Product2
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'image' => $this->faker->imageUrl(200, 200, 'fashion'),
            'cate_id' => $this->faker->numberBetween(1, 2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
