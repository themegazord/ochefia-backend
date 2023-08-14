<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
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
            'grupo_produto_id' => 1,
            'sub_grupo_produto_id' => 1,
            'fornecedor_produto_id' => 1,
            'classe_produto_id' => 1,
            'unidade_id' => 1,
            'produto_nome' => $this->faker->word,
            'produto_estoque' => $this->faker->numberBetween(0, 10),
            'produto_preco' => $this->faker->randomFloat(2, 0, 20)
        ];
    }
}
