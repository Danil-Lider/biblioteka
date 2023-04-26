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
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            // 'genre' =>  fake()->name(),
            // 'author' =>  fake()->name(),
            // 'publisher' =>  fake()->name(), // password
            'created_at' =>  now(),
            'status' =>  1,
        ];
    }
}
