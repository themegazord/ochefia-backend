<?php

namespace Tests\Feature\App\Services\Empresa;

use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EmpresaServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
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
