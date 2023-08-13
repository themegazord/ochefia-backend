<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrupoProduto>
 */
class GrupoProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grupo_produto_nome' => strtoupper($this->faker->word),
            'grupo_produto_tipo' => 'PRODUTO_FINAL'
        ];
    }
}
