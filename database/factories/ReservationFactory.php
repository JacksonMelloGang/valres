<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'utilisateur_id' => fake()->numberBetween(1, 7),
            'salle_id' => fake()->numberBetween(1, 10),
            'date_reservation' => fake()->date(),
            'reservation_periode' => fake()->numberBetween(1, 4),
            'reservation_commentaire' => fake()->sentence(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            //'email_verified_at' => null,
        ]);
    }


}
