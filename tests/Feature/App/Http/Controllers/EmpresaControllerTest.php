<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Empresa;
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

    public function testLevantarErroAoCadastrarEmpresaComCNPJInvalido(): void {
        $user = \App\Models\User::factory()->create();
        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '22593535000256',
            'empresa_descricao' => 'Filmes'
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST);
    }
    public function testLevantarErroAoCadastrarEmpresaComCNPJExistente(): void {
        $user = \App\Models\User::factory()->create();
        $empresa = Empresa::factory()->create();

        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => $empresa->getAttribute('empresa_cnpj'),
            'empresa_descricao' => 'Filmes'
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson(['erro' => 'O CNPJ ' . $payload['empresa_cnpj'] . ' já existe no sistema, por favor, conecte-se com seu usuário vinculado a ele']);
    }

    public function testLevantarErroAoPassarCNPJComQuantidadeDeCaracterDiferenteDe14(): void {
        $user = \App\Models\User::factory()->create();
        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '2259355000256',
            'empresa_descricao' => 'Filmes'
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O CNPJ ' . $payload['empresa_cnpj'] . ' é inválido, por favor, verificar.'
            ]);

        $this->assertDatabaseMissing('empresas', [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '2259355000256',
            'empresa_descricao' => 'Filmes'
        ]);
    }

    public function testLevantarErroAoPassarCNPJComDigitosIguais(): void {
        $user = \App\Models\User::factory()->create();
        $payload = [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '00000000000000',
            'empresa_descricao' => 'Filmes'
        ];

        $this->actingAs($user)
            ->post(route('empresa.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O CNPJ ' . $payload['empresa_cnpj'] . ' é inválido, por favor, verificar.'
            ]);

        $this->assertDatabaseMissing('empresas', [
            'empresa_nome' => 'Julio e Lorenzo Filmagens ME',
            'empresa_cnpj' => '00000000000000',
            'empresa_descricao' => 'Filmes'
        ]);
    }
}
