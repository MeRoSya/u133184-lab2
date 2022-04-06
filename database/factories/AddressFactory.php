<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'commonName' => Str::random(10),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'building' => $this->faker->buildingNumber(),
            'floor' => $this->faker->randomNumber(2),
            'flat' => $this->faker->randomNumber(3),
            'accessCode' => $this->faker->postcode()
        ];
    }
}
