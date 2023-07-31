<?php

namespace App\Services\Autenticacao;

use App\Exceptions\AutenticacaoException;
use App\Models\User;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class LoginService {
    public function __construct(private IUsuario $usuarioRepository)
    {

    }

    public function login(array $credenciais): array {
        $user = $this->verificacoesParaLogin($credenciais);
        return $this->respostaCompleta($user);
    }

    private function usuarioPorEmail(string $email): User|null {
        return $this->usuarioRepository->usuarioPorEmail($email);
    }

    private function verificacoesParaLogin(array $credenciais): AutenticacaoException|User {
        if (!(bool)$this->usuarioPorEmail($credenciais['email'])) return AutenticacaoException::emailInexistente();
        if (!Auth::attempt($credenciais)) return AutenticacaoException::senhaInvalida();
        return $this->usuarioPorEmail($credenciais['email']);
    }

    private function respostaCompleta(User $user): array {
        return [
            'token' => $user->createToken($user->email)->plainTextToken,
            'user' => $user->only(['id', 'name', 'email']),
        ];
    }
}
