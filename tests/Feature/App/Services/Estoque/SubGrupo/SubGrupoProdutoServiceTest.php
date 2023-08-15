<?php

namespace Tests\Feature\App\Services\Estoque\SubGrupo;

use App\Models\SubGrupoProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SubGrupoProdutoServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */

    public function testeLevantarErroDeSubGrupoJaExistente(): void {
        $usuario = User::factory()->create();
        $sub_grupo = SubGrupoProduto::factory()->create();

        $payload = [
            'sub_grupo_produto_nome' => $sub_grupo->getAttribute('sub_grupo_produto_nome')
        ];

        $this->actingAs($usuario)
            ->post(route('sub_grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O sub grupo ' . strtoupper($payload['sub_grupo_produto_nome']) . ' já existe, por favor, cadastre outro ou use o que já está cadastrado.'
            ]);
    }
}
