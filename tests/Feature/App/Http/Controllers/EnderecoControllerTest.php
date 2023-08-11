<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EnderecoControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarUmEndereco(): void
    {
        $user = User::factory()->create();
        $payload = [
            'endereco_rua' => 'Praça Cinco',
            'endereco_numero' => 192,
            'endereco_complemento' => 'S/C',
            'endereco_cep' => '25943491',
            'endereco_bairro' => 'Parada Modelo',
            'endereco_cidade' => 'Guapimirim',
        ];

        $this->actingAs($user)
            ->post(route('endereco.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'endereco' => [
                    'endereco_rua',
                    'endereco_numero',
                    'endereco_complemento',
                    'endereco_cep',
                    'endereco_bairro',
                    'endereco_cidade',
                ]
            ])
            ->assertJson([
                'mensagem' => 'Endereço cadastrado com sucesso',
                'endereco' => $payload
            ]);

        $this->assertDatabaseHas('enderecos', $payload);
    }

    public function testConseguirCadastrarEmpresaComCepInvalido(): void {
        $user = User::factory()->create();
        $payload = [
            'endereco_rua' => 'Praça Cinco',
            'endereco_numero' => 192,
            'endereco_complemento' => 'S/C',
            'endereco_cep' => '25943490',
            'endereco_bairro' => 'Parada Modelo',
            'endereco_cidade' => 'Guapimirim',
        ];

        $this->actingAs($user)
            ->post(route('endereco.store'), $payload)
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
