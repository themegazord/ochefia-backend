<?php

namespace Tests\Feature\App\Services\Estoque\Classe;

use App\Models\ClasseProduto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ClasseProdutoService extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testLevantarErroDeClasseDeProdutoJaExiste(): void
    {
        $usuario = User::factory()->create();
        $classe = ClasseProduto::factory()->create();

        $payload = [
            'classe_produto_nome' => $classe->getAttribute('classe_produto_nome')
        ];

        $this->actingAs($usuario)
            ->post(route('classe_produto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'A classe de produtos ' . strtoupper($payload['classe_produto_nome']) . ' já existe, cadastre outra ou use-a.'
            ]);
    }
}
