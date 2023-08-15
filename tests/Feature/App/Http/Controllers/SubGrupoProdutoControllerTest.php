<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\SubGrupoProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SubGrupoProdutoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarUmSubGrupoDeProduto(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'sub_grupo_produto_nome' => $this->faker->name
        ];

        $this->actingAs($usuario)
            ->post(route('sub_grupo_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'sub_grupo' => [
                    'sub_grupo_produto_nome',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Sub grupo de produto cadastrado com sucesso',
                'sub_grupo' => [
                    'sub_grupo_produto_nome' => strtoupper($payload['sub_grupo_produto_nome'])
                ]
            ]);
        $this->assertDatabaseHas('sub_grupo_produtos', [
            'sub_grupo_produto_nome' => strtoupper($payload['sub_grupo_produto_nome'])
        ]);
    }

}
