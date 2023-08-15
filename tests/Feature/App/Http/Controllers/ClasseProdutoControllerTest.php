<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\ClasseProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ClasseProdutoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarClasseDeProduto(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'classe_produto_nome' => $this->faker->word
        ];

        $this->actingAs($usuario)
            ->post(route('classe_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'classe_produto' => [
                    'classe_produto_nome',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Classe de produtos cadastrado com sucesso',
                'classe_produto' => [
                    'classe_produto_nome' => strtoupper($payload['classe_produto_nome']),
                ]
            ]);
        $this->assertDatabaseHas('classe_produto', [
            'classe_produto_nome' => strtoupper($payload['classe_produto_nome'])
        ]);
    }
}
