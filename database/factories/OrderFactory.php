<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'=>Customer::inRandomOrder()->first()->customer_id,
            'is_finished'=>fake()->randomElement([0,1]),
            'order_time'=>fake()->date(),
        ];
    }
}
