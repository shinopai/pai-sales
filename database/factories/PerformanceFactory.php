<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Performance;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Store;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sales_date' => $this->faker->datetime('yesterday'),
            'quantity' => rand(1, 10),
            'customer_id' => rand(1, Customer::count()),
            'store_id' => rand(1, Store::count()),
            'item_id' => rand(1, Item::count())
        ];
    }
}
