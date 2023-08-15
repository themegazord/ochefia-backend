<?php

namespace Tests\Feature\App\Services\Cliente;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ClienteServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
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

    public function testLevantarErroAoCadastrarClienteComCPFComQuantidadeDeDigitosDiferenteDe11(): void {
        $payload = [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => '0508039160',
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber
        ];

        $this->post(route('cliente.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O CPF ' . $payload['cliente_cpf'] . ' é inválido, por favor, verifique e tente novamente.'
            ]);
    }

    public function testLevantarErroAoCadastrarClienteComCPFComTodosOsDigitosIguais(): void {
        $payload = [
            'cliente_nome' => $this->faker->name,
            'cliente_email' => $this->faker->email,
            'cliente_senha' => 'password',
            'cliente_cpf' => '00000000000',
            'cliente_telefone' => $this->faker->phoneNumber,
            'cliente_telefone_contato' => $this->faker->phoneNumber
        ];

        $this->post(route('cliente.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O CPF ' . $payload['cliente_cpf'] . ' é inválido, por favor, verifique e tente novamente.'
            ]);
    }
}
