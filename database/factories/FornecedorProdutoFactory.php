<?php

namespace Database\Factories;

use App\Models\FabricanteProduto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FabricanteProduto>
 */
class FornecedorProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = FabricanteProduto::class;
    public function definition(): array
    {
        return [
            'fornecedor_produto_nome' => strtoupper($this->faker->word)
        ];
    }
}
