<?php

namespace Tests\Feature\App\Services\Funcionario;

use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\User;
use Database\Factories\FuncionarioDonoFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FuncionarioServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */

    public function testLevantarErroAoCadastrarMaisDonosDoQueOConfigurado(): void {
        $usuario = User::factory()->create();
        $empresa = Empresa::factory()->create();
        $endereco = Endereco::factory()->create();
        FuncionarioDonoFactory::new()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => $this->faker->name,
            'funcionario_email' => $this->faker->email,
            'funcionario_senha' => 'password',
            'cargo' => 'Dono',
            'acessos' => ['produto/cadastro']
        ];

        $this->actingAs($usuario)
            ->post(route('funcionario.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure([
                'erro'
            ])
            ->assertJson([
                'erro' => 'A quantidade de donos configurada por empresa foi excedida, por favor, configurar uma quantidade maior e tentar novamente.'
            ]);
        $this->assertDatabaseMissing('funcionarios', $payload);
    }

    public function testLevantarErroAoTentarCadastrarFuncionarioNormalNaRotaDeCadastroDeDono(): void {
        $usuario = User::factory()->create();
        $empresa = Empresa::factory()->create();
        $endereco = Endereco::factory()->create();
        Funcionario::factory()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => $this->faker->name,
            'funcionario_email' => $this->faker->email,
            'funcionario_senha' => 'password',
            'cargo' => 'Vendedor',
            'acessos' => ['produto/cadastro']
        ];

        $this->actingAs($usuario)
            ->post(route('funcionarioDono.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure([
                'erro'
            ])
            ->assertJson([
                'erro' => 'Você está tentando cadastrar um funcionário com cargo diferente de DONO na rota de cadastro de donos, por favor, verifique e tente novamente'
            ]);
        $this->assertDatabaseMissing('funcionarios', $payload);
    }
}
