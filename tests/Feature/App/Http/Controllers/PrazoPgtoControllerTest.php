<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PrazoPgtoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarPrazoPgto(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'V',
            'prazopgto_tipoforma' => 'DIN,BOL,CDB'
        ];

        $this->actingAs($usuario)
            ->post(route('prazopgto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'prazopgto'
            ])
            ->assertJson([
                'mensagem' => "O prazo de pagamento foi criado com sucesso",
                'prazopgto' => [
                    'prazopgto_nome' => $payload['prazopgto_nome'],
                    'prazopgto_tipo' => 'A_VISTA',
                    'prazopgto_tipoforma' => 'DINHEIRO,BOLETO,CARTAO_DEBITO'
                ]
            ]);
        $this->assertDatabaseHas('prazo_pgto', [
            'prazopgto_nome' => $payload['prazopgto_nome'],
            'prazopgto_tipo' => 'A_VISTA',
            'prazopgto_tipoforma' => 'DINHEIRO,BOLETO,CARTAO_DEBITO'
        ]);
    }

    public function testLevantarErroAoCadastrarUmPrazoDePagamentoComTipoInvalido(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'T',
            'prazopgto_tipoforma' => 'DIN,BOL,CDB'
        ];

        $this->actingAs($usuario)
            ->post(route('prazopgto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O tipo ' . $payload['prazopgto_tipo'] . ' não é compativel com os padrões do sistema, insira um válido.'
            ]);
        $this->assertDatabaseMissing('prazo_pgto', [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'T',
            'prazopgto_tipoforma' => 'DIN,BOL,CDB'
        ]);
    }

    public function testLevantarErroAoCadastrarUmPrazoDePagamentoComTipoFormaInvalido(): void
    {
        $usuario = User::factory()->create();

        $payload = [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'V',
            'prazopgto_tipoforma' => 'DIN,BOL,VRI'
        ];

        $this->actingAs($usuario)
            ->post(route('prazopgto.store'), $payload)
            ->assertStatus(Response::HTTP_CONFLICT)
            ->assertJsonStructure(['erro'])
            ->assertJson([
                'erro' => 'O tipo de forma de pagamento VRI não é compativel com os padrões do sistema, insira um válido'
            ]);
        $this->assertDatabaseMissing('prazo_pgto', [
            'prazopgto_nome' => $this->faker->word,
            'prazopgto_tipo' => 'V',
            'prazopgto_tipoforma' => 'DIN,BOL,VRI'
        ]);
    }
}
