<?php

namespace Tests\Feature\App\Services\Estoque\Grupo;

use App\Models\GrupoProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GrupoProdutoServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testLevantarErroDeTipoDeGrupoInexistente(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Despesas',
            'grupo_produto_tipo' => 'REVENDA'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O tipo de produto ' . $payload['grupo_produto_tipo'] . ' não existe no sistema, por favor, verificar na documentação'
            ]);

        $this->assertDatabaseMissing('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

    public function testLevantarErroDeGrupoProdutoJaExistente(): void {
        $usuario = User::factory()->create();
        $grupo = GrupoProduto::factory()->create();

        $payload = [
            'grupo_produto_nome' => $grupo->getAttribute('grupo_produto_nome'),
            'grupo_produto_tipo' => 'PRODUTO_FINAL'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure([
                'erro'
            ])
            ->assertJson([
                'erro' => 'O grupo ' . strtoupper($payload['grupo_produto_nome']) . ' já existe na base de dados, cadastre outro ou use-o.'
            ]);
    }
}
