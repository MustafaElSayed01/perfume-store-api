<?php

namespace Database\Factories;

use App\Models\Address;
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
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'usage_type' => $this->faker->randomElement(['shipping', 'billing', 'both']),
            'type' => $this->faker->randomElement(['home', 'work', 'other']),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'is_default' => $this->faker->boolean(30),
        ];
    }
    // public function configure()
    // {
    //     return $this->afterCreating(function (Address $address) {
    //         $user = $address->user;

    //         $existingDefaults = $user->addresses()
    //             ->where('is_default', true)
    //             ->pluck('usage_type')
    //             ->toArray();

    //         $isDefault = false;

    //         if (empty($existingDefaults)) {
    //             $isDefault = true;
    //         } else {
    //             if (in_array('both', $existingDefaults)) {
    //                 $isDefault = false;
    //             } elseif (in_array('shipping', $existingDefaults) && $address->usage_type === 'billing') {
    //                 $isDefault = true;
    //             } elseif (in_array('billing', $existingDefaults) && $address->usage_type === 'shipping') {
    //                 $isDefault = true;
    //             }
    //         }

    //         if ($isDefault) {
    //             $address->updateQuietly(['is_default' => true]);
    //         }
    //     });
    // }
}
