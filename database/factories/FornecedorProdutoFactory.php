<?php

namespace Database\Factories;

use App\Models\FornecedorProduto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FornecedorProduto>
 */
class FornecedorProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = FornecedorProduto::class;
    public function definition(): array
    {
        return [
            'fornecedor_produto_nome' => strtoupper($this->faker->word)
        ];
    }
}
