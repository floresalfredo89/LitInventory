<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBook>
 */
class UserBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'book_id' => fake()->numberBetween(1,999),
            'acquired_at' => fake()->date(),
            'buy_price' => fake()->randomFloat(2, 300, 800)
        ];
    }
}
