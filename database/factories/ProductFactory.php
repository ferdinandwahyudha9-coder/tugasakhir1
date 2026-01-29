<?php

namespace Database\Factories;

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
            'nama' => fake()->words(3, true),
            'harga' => fake()->numberBetween(50000, 500000),
            'stok' => fake()->numberBetween(10, 100),
            'deskripsi' => fake()->sentence(),
            'label' => fake()->randomElement(['New', 'Hot', 'Best Seller', null]),
        ];
    }
}
