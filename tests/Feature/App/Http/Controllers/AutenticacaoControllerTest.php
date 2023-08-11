<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use function PHPUnit\Framework\assertJson;

class AutenticacaoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function testeConseguirLogar(): void
    {
        $user = User::factory()->create();
        $this->postJson(route('autenticacao.login'), [
            'email' => $user->getAttribute('email'),
            'password' => 'password'
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'mensagem' => [
                    'token',
                    'user' => [
                        'id',
                        'name',
                        'email'
                    ],
                ],
            ])
            ->assertJson([
                'mensagem' => [
                    'user' => [
                        'name' => $user->getAttribute('name'),
                        'email' => $user->getAttribute('email')
                    ],
                ],
            ]);
    }
}
