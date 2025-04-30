<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Employee;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => order::inRandomOrder()->first()->order_id,
            'employee_id' => fake()->randomElement([Employee::inRandomOrder()->first()->employee_id, null]),
            'product_type' => fake()->randomElement(['PC', 'Laptop', 'Tablet', 'Smartphone(iOS)','Smartphone(Android)','Other']),
            'product_description' => fake()->sentence(),
            'product_stock_id' => Stock::inRandomOrder()->first()->product_stock_id,
            'product_status' => fake()->randomElement(['Completed', 'In progress', 'Cancelled']),
        ];
    }
}
