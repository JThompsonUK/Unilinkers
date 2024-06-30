<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $sequence = 1;

    public function definition(): array
    {
        return [
            'name' => 'Property ' . self::$sequence++,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'no_of_rooms' => $this->faker->numberBetween(1, 10),
        ];
    }
}
