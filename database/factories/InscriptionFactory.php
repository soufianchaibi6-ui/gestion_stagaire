<?php

namespace Database\Factories;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inscription>
 */
class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'cin' => strtoupper($this->faker->bothify('??######')), // مثال: AB123456
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'sexe' => $this->faker->randomElement(['homme', 'femme']),
            'telephone' => $this->faker->numerify('06########'),
            'email' => $this->faker->unique()->safeEmail(),
            'filiere' => $this->faker->randomElement(['Informatique', 'Gestion', 'Réseaux', 'Développement']),
            'etablissement' => $this->faker->company(),
            'niveau_etude' => $this->faker->randomElement(['Bac', 'Bac+2', 'Bac+3', 'Master']),
            'type_stage' => $this->faker->randomElement(['PFE', 'Stage d\'été', 'Stage pratique']),
            'ville' => $this->faker->city(),
            'status' => 'en_attente',
            'date_debut' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'date_fin' => $this->faker->dateTimeBetween('+1 month', '+3 months')->format('Y-m-d'),
            'cv' => 'cvs/'.$this->faker->uuid.'.pdf',
        ];
    }
}
