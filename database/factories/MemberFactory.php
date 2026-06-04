<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'name_kana' => $this->faker->name(),
            'password' => Hash::make('password'),
            'email' => $this->faker->unique()->safeEmail(),
            'prefecture' => $this->faker->word(),
            'city' => $this->faker->word(),
            'other' => $this->faker->word(),
            'dm' => $this->faker->boolean(),
            'roles' => $this->faker->randomElement(['admin', 'manager', 'general']),
            'info' => json_encode([
                'sns' => [
                    'facebook' => $this->faker->url(),
                    'instagram' => $this->faker->url(),
                ],
                'language' => $this->faker->randomElement(['ja', 'en', 'de']),
            ]),
        ];
    }
}
