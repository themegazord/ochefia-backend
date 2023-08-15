<?php

namespace Tests\Feature\App\Services\Estoque\Unidade;

use App\Models\Unidade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UnidadeServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */

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
