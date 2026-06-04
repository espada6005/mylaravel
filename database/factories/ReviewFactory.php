<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
            'member_id' => Member::factory(),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'rate' => $this->faker->numberBetween(1, 5),
            'body' => $this->faker->sentence(),
        ];
    }

    public function published(): Factory
    {
        return $this->state([
            'status' => 'published'
        ]);
    }
}
