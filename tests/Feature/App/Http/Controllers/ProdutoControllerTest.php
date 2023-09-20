<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\ClasseProduto;
use App\Models\Empresa;
use App\Models\FabricanteProduto;
use App\Models\GrupoProduto;
use App\Models\SubGrupoProduto;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProdutoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarProduto(): void
    {
        $usuario = User::factory()->create();
        $grupo = GrupoProduto::factory()->create();
        $subgrupo = SubGrupoProduto::factory()->create();
        $fornecedor = FabricanteProduto::factory()->create();
        $classe = ClasseProduto::factory()->create();
        $unidade = Unidade::factory()->create();
        $empresa = Empresa::factory()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'grupo_produto_id' => $grupo->getAttribute('id'),
            'sub_grupo_produto_id' => $subgrupo->getAttribute('id'),
            'fornecedor_produto_id' => $fornecedor->getAttribute('id'),
            'classe_produto_id' => $classe->getAttribute('id'),
            'unidade_id' => $unidade->getAttribute('id'),
            'produto_nome' => $this->faker->word,
            'produto_estoque' => $this->faker->numberBetween(0, 10),
            'produto_preco' => $this->faker->randomFloat(2, 0, 20)
        ];

        $this->actingAs($usuario)
            ->post(route('produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'produto' => [
                    'empresa_id',
                    'grupo_produto_id',
                    'sub_grupo_produto_id',
                    'fornecedor_produto_id',
                    'classe_produto_id',
                    'unidade_id',
                    'produto_nome',
                    'produto_estoque',
                    'produto_preco',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Produto cadastrado com sucesso',
                'produto' => $payload
            ]);
        $this->assertDatabaseHas('produtos', $payload);
    }
}
