<?php

namespace Tests\Feature\App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EmpresaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function testConseguirCadastrarUmEmpresaComLogo(): void
    {
        $imagem = UploadedFile::fake()->image('empresa.jpg');
        $user = \App\Models\User::factory()->create();
        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '22593535000156',
            'empresa_descricao' => 'Filmes',
            'empresa_logo' => $imagem
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'empresa' => [
                    'id',
                    'empresa_nome',
                    'empresa_cnpj',
                    'empresa_descricao',
                    'empresa_logo'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Empresa cadastrada com sucesso',
                'empresa' => [
                    'empresa_nome' => $payload['empresa_nome'],
                    'empresa_cnpj' => $payload['empresa_cnpj'],
                    'empresa_descricao' => $payload['empresa_descricao'],
                ]
            ]);

        $this->assertDatabaseHas('empresas', [
            'empresa_nome' => $payload['empresa_nome'],
            'empresa_cnpj' => $payload['empresa_cnpj'],
            'empresa_descricao' => $payload['empresa_descricao']
        ]);

    }

    public function testConseguirCadastrarUmaEmpresaSemLogo(): void {
        $user = \App\Models\User::factory()->create();
        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '22593535000156',
            'empresa_descricao' => 'Filmes'
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'empresa' => [
                    'id',
                    'empresa_nome',
                    'empresa_cnpj',
                    'empresa_descricao',
                ]
            ])
            ->assertJson([
                'mensagem' => 'Empresa cadastrada com sucesso',
                'empresa' => [
                    'empresa_nome' => $payload['empresa_nome'],
                    'empresa_cnpj' => $payload['empresa_cnpj'],
                    'empresa_descricao' => $payload['empresa_descricao'],
                ]
            ]);

        $this->assertDatabaseHas('empresas', [
            'empresa_nome' => $payload['empresa_nome'],
            'empresa_cnpj' => $payload['empresa_cnpj'],
            'empresa_descricao' => $payload['empresa_descricao']
        ]);
    }
}
