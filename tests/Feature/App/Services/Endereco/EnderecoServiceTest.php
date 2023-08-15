<?php

namespace Tests\Feature\App\Services\Endereco;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EnderecoServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testLevantarErroAoCadastrarEmpresaComCepInvalido(): void {
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
