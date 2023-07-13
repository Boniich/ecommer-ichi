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
            'name' => $this->faker->sentence(2),
            'short_description' => $this->faker->text(20),
            'image' => 'products/' . $this->faker->image('public/storage/products', 300, 300, null, false),
            'amount' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(1, 100)
        ];
    }
}
