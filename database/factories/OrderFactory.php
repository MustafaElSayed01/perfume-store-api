<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Cart;
use App\Models\User;
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
        $user = User::inRandomOrder()->first();

        $shipping = $user->addresses()
            ->whereIn('usage_type', ['shipping', 'both'])
            ->inRandomOrder()
            ->first();

        $billing = $user->addresses()
            ->whereIn('usage_type', ['billing', 'both'])
            ->where('id', '!=', $shipping?->id)
            ->inRandomOrder()
            ->first();

        return [
            'order_number' => strtoupper($this->faker->bothify('ORD-####-????')),
            'user_id' => $user->id,
            'cart_id' => Cart::inRandomOrder()->first()->id ?? Cart::factory()->create()->id,
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'canceled']),
            'total_amount' => $this->faker->randomFloat(2, 10, 500),
            'shipping_amount' => $this->faker->randomFloat(2, 0, 50),
            'tax_amount' => $this->faker->randomFloat(2, 0, 100),
            'final_total' => function (array $attributes) {
                return $attributes['total_amount'] + $attributes['shipping_amount'] + $attributes['tax_amount'];
            },
            'shipping_address_id' => $shipping->id,
            'billing_address_id' => $billing->id ?? $shipping->id,
        ];
    }
}
