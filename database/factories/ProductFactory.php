<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(1),
            'short_description' => $this->faker->text(),
            'status' => 'In Stock',
            'price' => random_int(50, 4000),
            'sale_price' => random_int(50, 4000),
            'thumbnail' => $this->faker->imageUrl(),
            'category_id' => ProductCategory::get()->random()->id
        ];
    }
}
