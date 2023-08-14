<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarCliente(): void
    {
        $payload = [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => '05081039160',
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber
        ];

        $this->post(route('cliente.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'dados' => [
                    'cliente' => [
                        'cliente_nome',
                        'cliente_email',
                        'cliente_cpf',
                        'cliente_telefone',
                        'cliente_telefone_contato',
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
                'mensagem' => 'Cliente cadastrado com sucesso',
                'dados' => [
                    'cliente' => [
                        'cliente_nome' => $payload['cliente_nome'],
                        'cliente_email' => $payload['cliente_email'],
                        'cliente_cpf' => $payload['cliente_cpf'],
                        'cliente_telefone' => $payload['cliente_telefone'],
                        'cliente_telefone_contato' => $payload['cliente_telefone_contato'],
                    ],
                    'login' => [
                        'user' => [
                            'name' => $payload['cliente_nome'],
                            'email' => $payload['cliente_email']
                        ]
                    ],
                ]
            ]);
        $this->assertDatabaseHas('clientes', [
            'cliente_nome' => $payload['cliente_nome'],
            'cliente_email' => $payload['cliente_email'],
            'cliente_cpf' => $payload['cliente_cpf'],
            'cliente_telefone' => $payload['cliente_telefone'],
            'cliente_telefone_contato' => $payload['cliente_telefone_contato']
        ]);
    }
    public function testLevantarErroAoCadastrarClienteComCPFInvalidoMatematicamente(): void {
        $payload = [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => '05081139160',
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber
        ];

        $this->post(route('cliente.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'erro'
            ])
            ->assertJson([
                'erro' => 'O CPF ' . $payload['cliente_cpf'] . ' é inválido, por favor, verifique e tente novamente.'
            ]);
        $this->assertDatabaseMissing('clientes', $payload);
    }
    public function testLevantarErroAoCadastrarClienteComCPFJaExistente(): void {
        $usuario = User::factory()->create();
        $cliente = Cliente::factory()->create();

        $payload = [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => $cliente->getAttribute('cliente_cpf'),
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber
        ];

        $this->post(route('cliente.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O CPF ' . $payload['cliente_cpf'] . ' já está cadastro, por favor, verifique e tente novamente.'
            ]);
    }
}
