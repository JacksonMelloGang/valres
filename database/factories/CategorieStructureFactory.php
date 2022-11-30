<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategorieStructureFactory extends Factory
{
    protected $model = \App\Models\Categorie_structure::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'catid' => $this->faker->unique()->numberBetween(1, 7),
            'libelle' => $this->faker->unique()->text(),
        ];
    }
}
