<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrazoPgto>
 */
class PrazoPgtoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'A_VISTA',
            'prazopgto_tipoforma' => 'DINHEIRO'
        ];
    }
}
