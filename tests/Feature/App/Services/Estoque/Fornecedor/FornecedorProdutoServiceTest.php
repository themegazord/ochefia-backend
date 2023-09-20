<?php

namespace Tests\Feature\App\Services\Estoque\Fornecedor;

use App\Models\FabricanteProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FornecedorProdutoServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testLevantarErroAoCadastrarFornecedorDeProdutoExistente(): void {
        $usuario = User::factory()->create();
        $fornecedor = FabricanteProduto::factory()->create();

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
