<?php

namespace Database\Factories;

use App\Models\Jiri;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jiri>
 */
class JiriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'begins_at' => '08:30',
            'ends_at' => '17:30',
            'status' => fake()->randomElement([
                'upcoming',
                'ongoing',
                'completed',
            ]),
        ];
    }
}
