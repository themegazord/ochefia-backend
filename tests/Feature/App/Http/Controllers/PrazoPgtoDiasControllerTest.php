<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\PrazoPgto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PrazoPgtoDiasControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testConseguirCadastrarPrazoPgtoDias(): void
    {
        $usuario = User::factory()->create();
        $prazopgto = PrazoPgto::factory()->create();

        $payload = [
            "parcelas" => [
                [
                    "prazopgto_id" => $prazopgto->getAttribute('id'),
                    "dias" => 30
                ],
                [
                    "prazopgto_id" => $prazopgto->getAttribute('id'),
                    "dias" => 60
                ]
            ]
        ];

        $this->actingAs($usuario)
            ->post(route('prazopgtodias.store'), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'mensagem',
                'parcelas' => [
                    [
                        "prazopgto_id",
                        "dias"
                    ],
                    [
                        "prazopgto_id",
                        "dias"
                    ]
                ]
            ])
            ->assertJson([
                "mensagem" => "Dias para prazo de pagamento cadastrados com sucesso",
                "parcelas" => [
                    [
                        "prazopgto_id" => 1,
                        "dias" => 30
                    ],
                    [
                        "prazopgto_id" => 1,
                        "dias" => 60
                    ]
                ]
            ]);
        $this->assertDatabaseHas('prazo_pgto_dias',
            [
                "prazopgto_id" => 1,
                "dias" => 30
            ]
        );
        $this->assertDatabaseHas('prazo_pgto_dias',
            [
                "prazopgto_id" => 1,
                "dias" => 60
            ]
        );
    }
}
