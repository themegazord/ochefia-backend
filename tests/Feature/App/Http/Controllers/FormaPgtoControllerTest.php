<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\PrazoPgto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FormaPgtoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarUmaFormaDePagamentoTipoDinheiro(): void
    {
        $prazopgto = PrazoPgto::factory()->create();
        $usuario = User::factory()->create();
        $payload = [
            'formapgto_nome' => $this->faker->word,
            'formapgto_tipo' => 'DIN',
            'prazopgto_id' => $prazopgto->getAttribute('id')
        ];

        $this->actingAs($usuario)
            ->post(route('formapgto.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'formapgto' => [
                    'formapgto_nome',
                    'formapgto_tipo',
                    'prazopgto_id',
                    'id'
                ]
            ])
            ->assertJson([
                'mensagem' => 'Forma de pagamento cadastrada com sucesso',
                'formapgto' => [
                    'formapgto_nome' => $payload['formapgto_nome'],
                    'formapgto_tipo' => 'DINHEIRO',
                    'prazopgto_id' => $prazopgto->getAttribute('id')
                ]
            ]);
        $this->assertDatabaseHas('forma_pgto', [
            'formapgto_nome' => $payload['formapgto_nome'],
            'formapgto_tipo' => 'DINHEIRO',
            'prazopgto_id' => $prazopgto->getAttribute('id')
        ]);
    }
    public function testErroAoCadastrarUmaFormaDePagamento(): void {
        $usuario = User::factory()->create();
        $prazopgto = PrazoPgto::factory()->create();

        $payload = [
            'formapgto_nome' => $this->faker->word,
            'formapgto_tipo' => 'X',
            'prazopgto_id' => $prazopgto->getAttribute('id')
        ];

        $this->actingAs($usuario)
            ->post(route('formapgto.store'), $payload)
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure(['erro'])
            ->assertJson(['erro' => 'O tipo X não faz parte dos tipos de forma de pagamento padrão.']);

        $this->assertDatabaseMissing('forma_pgto', [
            'formapgto_nome' => $this->faker->word,
            'formapgto_tipo' => 'X',
            'prazopgto_id' => $prazopgto->getAttribute('id')
        ]);
    }
}
