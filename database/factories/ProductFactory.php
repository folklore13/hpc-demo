<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(),
            'category_id' => Category::factory(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(100000, 200000),
            'image' => fake()->image(),
        ];
    }
}
