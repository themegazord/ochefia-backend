<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\FornecedorProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FornecedorProdutoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarFornecedorDeProduto(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'fornecedor_produto_nome' => $this->faker->word
        ];

        $this->actingAs($usuario)
            ->post(route('fornecedor_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'fornecedor_produto' => [
                    'fornecedor_produto_nome',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Fornecedor de produtos cadastrado com sucesso',
                'fornecedor_produto' => [
                    'fornecedor_produto_nome' => strtoupper($payload['fornecedor_produto_nome'])
                ]
            ]);
        $this->assertDatabaseHas('fornecedor_produto', [
            'fornecedor_produto_nome' => strtoupper($payload['fornecedor_produto_nome'])
        ]);
    }

    public function testLevantarErroAoCadastrarFornecedorDeProdutoExistente(): void {
        $usuario = User::factory()->create();
        $fornecedor = FornecedorProduto::factory()->create();

        $payload = [
            'fornecedor_produto_nome' => $fornecedor->getAttribute('fornecedor_produto_nome')
        ];

        $this->actingAs($usuario)
            ->post(route('fornecedor_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O fornecedor ' . strtoupper($payload['fornecedor_produto_nome']) . ' já existe no banco de dados, por favor, cadastro outro ou use-o'
            ]);
    }
}
