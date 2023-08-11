<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'endereco_rua' => $this->faker->streetName,
            'endereco_numero' => $this->faker->numberBetween(0, 999),
            'endereco_complemento' => $this->faker->streetSuffix,
            'endereco_cep' => 79075104,
            'endereco_bairro' => 'Apiaba',
            'endereco_cidade' => $this->faker->city
        ];
    }
}
