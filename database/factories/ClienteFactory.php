<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => '05081039160',
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber,
            'usuario_id' => 1
        ];
    }
}
