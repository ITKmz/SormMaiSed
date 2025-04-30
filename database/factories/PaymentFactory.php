<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order_id = Order::pluck("order_id")->toArray();
        return [
            'order_id' =>fake()->unique()->randomElement($order_id),
            'payment_method' =>fake()->randomElement(['Cash', 'Credit Card', 'Debit Card']),
            'is_paid' =>fake()->randomElement([0,1]),
            'payment_date' =>fake()->date(),
        ];
    }
}
