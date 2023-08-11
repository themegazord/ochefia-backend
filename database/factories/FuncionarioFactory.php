<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empresa_id' => 1,
            'endereco_id' => 1,
            'usuario_id' => 1,
            'funcionario_nome' => $this->faker->name,
            'funcionario_email' => $this->faker->email,
            'funcionario_senha' => 'password',
            'cargo' => 'VENDEDOR',
            'acessos' => 'produto/cadastro'
        ];
    }
}
