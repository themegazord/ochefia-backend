<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\GrupoProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GrupoProdutoControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarGrupoDeProdutoTipoProdutoFinal(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Bolacha de Maizena Marilan',
            'grupo_produto_tipo' => 'PRODUTO_FINAL'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'grupo' => [
                    'grupo_produto_nome',
                    'grupo_produto_tipo',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => [
                    'grupo_produto_nome' => $payload['grupo_produto_nome'],
                    'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
                ]
            ]);
        $this->assertDatabaseHas('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

    public function testConseguirCadastrarGrupoDeProdutoTipoMateriaPrima(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Farinha de Trigo',
            'grupo_produto_tipo' => 'MATERIA_PRIMA'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'grupo' => [
                    'grupo_produto_nome',
                    'grupo_produto_tipo',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => [
                    'grupo_produto_nome' => $payload['grupo_produto_nome'],
                    'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
                ]
            ]);
        $this->assertDatabaseHas('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

    public function testConseguirCadastrarGrupoDeProdutoTipoEmbalagem(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Embalagem a Vácuo',
            'grupo_produto_tipo' => 'EMBALAGEM'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'grupo' => [
                    'grupo_produto_nome',
                    'grupo_produto_tipo',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => [
                    'grupo_produto_nome' => $payload['grupo_produto_nome'],
                    'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
                ]
            ]);
        $this->assertDatabaseHas('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

    public function testConseguirCadastrarGrupoDeProdutoTipoServicos(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Entrega de Alimentos',
            'grupo_produto_tipo' => 'SERVICOS'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'grupo' => [
                    'grupo_produto_nome',
                    'grupo_produto_tipo',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => [
                    'grupo_produto_nome' => $payload['grupo_produto_nome'],
                    'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
                ]
            ]);
        $this->assertDatabaseHas('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

    public function testConseguirCadastrarGrupoDeProdutoTipoOutros(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'grupo_produto_nome' => 'Despesas',
            'grupo_produto_tipo' => 'OUTROS'
        ];

        $this->actingAs($usuario)
            ->post(route('grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'grupo' => [
                    'grupo_produto_nome',
                    'grupo_produto_tipo',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => [
                    'grupo_produto_nome' => $payload['grupo_produto_nome'],
                    'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
                ]
            ]);
        $this->assertDatabaseHas('grupo_produtos', [
            'grupo_produto_nome' => $payload['grupo_produto_nome'],
            'grupo_produto_tipo' => strtolower($payload['grupo_produto_tipo'])
        ]);
    }

}
