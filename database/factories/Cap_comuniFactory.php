<?php

namespace Database\Factories;
use App\Models\Comuni;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cap_comuni>
 */
class Cap_comuniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_comune' => fake()->randomNumber(5, true),
            'cap' => fake()->randomNumber(5, true),
        ];
    }
}
