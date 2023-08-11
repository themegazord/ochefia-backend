<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\User;
use Database\Factories\FuncionarioDonoFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FuncionarioControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarFuncionarioDono(): void
    {
        $empresa = Empresa::factory()->create();
        $endereco = Endereco::factory()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => 'Jorge Cauê Souza',
            'funcionario_email' => 'jorge-souza82@alstom.com',
            'funcionario_senha' => 'password',
            'cargo' => 'Dono',
            'acessos' => ['*']
        ];

        $this->post(route('funcionarioDono.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'dados' => [
                    'funcionario' => [
                        'empresa_id',
                        'endereco_id',
                        'funcionario_nome',
                        'funcionario_email',
                        'cargo',
                        'acessos',
                        'usuario_id',
                        'id'
                    ],
                    'login' => [
                        'token',
                        'user' => [
                            'id',
                            'name',
                            'email'
                        ]
                    ]
                ]
            ])
            ->assertJson([
                'mensagem' => 'Funcionário cadastrado com sucesso',
                'dados' => [
                    'funcionario' => [
                        'empresa_id' => $empresa->getAttribute('id'),
                        'endereco_id' => $endereco->getAttribute('id'),
                        'funcionario_nome' => $payload['funcionario_nome'],
                        'funcionario_email' => $payload['funcionario_email'],
                        'cargo' => 'DONO',
                        'acessos' => '*'
                    ],
                    'login' => [
                        'user' => [
                            'name' => $payload['funcionario_nome'],
                            'email' => $payload['funcionario_email']
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseHas('funcionarios', [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => $payload['funcionario_nome'],
            'funcionario_email' => $payload['funcionario_email'],
            'cargo' => 'DONO',
            'acessos' => '*'
        ]);
    }

    public function testConseguirCadastrarFuncionario(): void {
        $usuario = User::factory()->create();
        $empresa = Empresa::factory()->create();
        $endereco = Endereco::factory()->create();
        Funcionario::factory()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => 'Benjamin Nelson Paulo Baptista',
            'funcionario_email' => 'benjaminnelsonbaptista@murosterrae.com.br',
            'funcionario_senha' => 'password',
            'cargo' => 'Vendedor',
            'acessos' => ['produto/cadastro']
        ];

        $this->actingAs($usuario)
            ->post(route('funcionario.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'dados' => [
                    'funcionario' => [
                        'empresa_id',
                        'endereco_id',
                        'funcionario_nome',
                        'funcionario_email',
                        'cargo',
                        'acessos',
                        'usuario_id',
                        'id'
                    ],
                    'login' => [
                        'token',
                        'user' => [
                            'id',
                            'name',
                            'email'
                        ]
                    ]
                ]
            ])
            ->assertJson([
                'mensagem' => 'Funcionário cadastrado com sucesso',
                'dados' => [
                    'funcionario' => [
                        'empresa_id' => $empresa->getAttribute('id'),
                        'endereco_id' => $endereco->getAttribute('id'),
                        'funcionario_nome' => $payload['funcionario_nome'],
                        'funcionario_email' => $payload['funcionario_email'],
                        'cargo' => 'VENDEDOR',
                        'acessos' => 'produto/cadastro'
                    ],
                    'login' => [
                        'user' => [
                            'name' => $payload['funcionario_nome'],
                            'email' => $payload['funcionario_email']
                        ]
                    ]
                ]
            ]);
        $this->assertDatabaseHas('funcionarios', [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => $payload['funcionario_nome'],
            'funcionario_email' => $payload['funcionario_email'],
            'cargo' => 'VENDEDOR',
            'acessos' => 'produto/cadastro'
        ]);
    }

    public function testLevantarErroAoCadastrarFuncionarioComMesmoEmail(): void {
        $usuario = User::factory()->create();
        $empresa = Empresa::factory()->create();
        $endereco = Endereco::factory()->create();
        $funcionario = Funcionario::factory()->create();

        $payload = [
            'empresa_id' => $empresa->getAttribute('id'),
            'endereco_id' => $endereco->getAttribute('id'),
            'funcionario_nome' => 'Benjamin Nelson Paulo Baptista',
            'funcionario_email' => $funcionario->getAttribute('funcionario_email'),
            'funcionario_senha' => 'password',
            'cargo' => 'Vendedor',
            'acessos' => ['produto/cadastro']
        ];

        $this->actingAs($usuario)
            ->post(route('funcionario.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure([
                'erro'
            ])
            ->assertJson([
                'erro' => 'O email ' . $payload['funcionario_email'] . ' já está cadastrado em sua empresa, por favor, verifique.'
            ]);
        $this->assertDatabaseMissing('funcionarios', $payload);
    }

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
