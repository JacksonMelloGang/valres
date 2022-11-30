<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdministrationFactory extends Factory
{

    protected $model = \App\Models\Administration::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'utilisateur_id' => $this->faker->unique()->numberBetween(1, 7),
            'service_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
