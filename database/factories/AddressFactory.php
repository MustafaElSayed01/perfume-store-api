<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        $alreadyHasDefault = $user->addresses()->where('is_default', true)->exists();

        return [
            'user_id' => $user->id,
            'usage_type' => $alreadyHasDefault
                ? $this->faker->randomElement(['shipping', 'billing'])
                : $this->faker->randomElement(['both', 'shipping', 'billing']),
            'type' => $this->faker->randomElement(['home', 'work', 'other']),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'is_default' => !$alreadyHasDefault,
        ];
    }
}
;