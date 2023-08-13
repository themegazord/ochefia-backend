<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Unidade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UnidadeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarUnidadeDeMedida(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'unidade_nome' => $this->faker->word()
        ];

        $this->actingAs($usuario)
            ->post(route('unidade.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'unidade' => [
                    'unidade_nome'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Unidade de medida cadastrada com sucesso',
                'unidade' => [
                    'unidade_nome' => strtoupper($payload['unidade_nome'])
                ]
            ]);
        $this->assertDatabaseHas('unidades', [
            'unidade_nome' => strtoupper($payload['unidade_nome'])
        ]);
    }

    public function testLevantarErroAoCadastrarUnidadeQueJaExiste(): void {
        $usuario = User::factory()->create();
        $unidade = Unidade::factory()->create();

        $payload = [
            'unidade_nome' => $unidade->getAttribute('unidade_nome')
        ];

        $this->actingAs($usuario)
            ->post(route('unidade.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'A unidade de medida ' . strtoupper($payload['unidade_nome']) . ' já existe, cadastre uma nova ou use-a'
            ]);
    }
}
