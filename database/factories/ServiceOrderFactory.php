<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehiclePlate' => $this->faker->text(7),
            'entryDateTime' => $this->faker->dateTime(),
            'exitDateTime' => $this->faker->dateTime(),
            'priceType' => $this->faker->text(55),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
