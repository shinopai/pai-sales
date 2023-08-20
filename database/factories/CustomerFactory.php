<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static int $number = 1;

    public function definition(): array
    {
        return [
            'membership_number' => function () {{ return self::$number++; }},
            'name' => $this->faker->name(),
            'sex' => rand(1, 2),
            'birth_year' => rand(1930, 2000),
            'birth_month' => rand(1, 12),
            'birth_day' => 1,
            'zip' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'tel' => $this->faker->phoneNumber()
        ];
    }
}
