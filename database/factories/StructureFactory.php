<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StructureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'structure_nom' => $this->faker->unique()->company(),
            'structure_adresse' => $this->faker->unique()->address(),
            'cat_id' => $this->faker->numberBetween(1, 3),

        ];
    }
}
