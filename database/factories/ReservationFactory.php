<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    protected $model = \App\Models\Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'utilisateur_id' => $this->faker->numberBetween(1, 6),
            'salle_id' => $this->faker->numberBetween(1, 10),

            'date_reservation' => $this->faker->date(),
            'reservation_periode' => $this->faker->numberBetween(1, 4),

            'reservation_commentaire' => $this->faker->text(100),
            'reservation_statut' => $this->faker->numberBetween(1, 3),

        ];
    }
}
