<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Guesser\Name;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            
            'author'=>fake()->name,
            'mail'=>fake()->unique()->safeEmail(),
            'count'=>fake()->numberBetween(1,100)

        ];
    }
}
