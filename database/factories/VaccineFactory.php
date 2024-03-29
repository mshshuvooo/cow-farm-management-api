<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "vaccination_date" => $this->faker->date(),
            "vaccine_type" => $this->faker->randomElement(["fmd","anthrax","bq","hs","dewormer","lumpy"]),

        ];
    }
}
