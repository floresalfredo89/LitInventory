<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_language_id' => fake()->numberBetween(1,2),
            'book_format_id' => fake()->numberBetween(1,2),
            'book_type_id' => fake()->numberBetween(1,3),
            'isbn' => fake()->isbn13(),
            'title' => fake()->sentence(4),
            'cover_url' => fake()->url(),
            'publication_year' => fake()->year(),
            'page_count' => fake()->numberBetween(50,1200),
            'height' => fake()->randomFloat(1, 17, 30),
            'width' => fake()->randomFloat(1, 11, 16)
        ];
    }
}
