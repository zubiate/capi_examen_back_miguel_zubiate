<?php

namespace Database\Factories;

use App\Models\UserDomicilio;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDomicilioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDomicilio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ciudad' => $this->faker->city,
            'colonia' => $this->faker->secondaryAddress,
            'cp' => $this->faker->postcode,
            'domicilio' => $this->faker->address,
            'numero_exterior' => $this->faker->buildingNumber
        ];
    }
}
