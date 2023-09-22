<?php

namespace App\Services\Autenticacao;

use App\Exceptions\AutenticacaoException;
use App\Models\User;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use App\Repositories\Interfaces\Funcionarios\IFuncionario;
use Illuminate\Support\Facades\Hash;

class LoginService {
    public function __construct(private readonly IUsuario $usuarioRepository, private readonly  IFuncionario $funcionarioRepository)
    {

    }

    /**
     * @throws AutenticacaoException
     */
    public function login(array $credenciais): array {
        $user = $this->verificacoesParaLogin($credenciais);
        return $this->respostaCompleta($user);
    }

    private function usuarioPorEmail(string $email): User|null {
        return $this->usuarioRepository->usuarioPorEmail($email);
    }

    /**
     * @throws AutenticacaoException
     */
    private function verificacoesParaLogin(array $credenciais): AutenticacaoException|User {
        if (!$this->usuarioPorEmail($credenciais['email'])) return AutenticacaoException::emailInexistente();
        return $this->checaSeSenhaConfere($credenciais);
    }

    private function respostaCompleta(User $user): array {
        $empresa = $this->funcionarioRepository->funcionarioPorEmail($user->getAttribute('email'));
        return [
            'token' => $user->createToken($user->getAttribute('email'))->plainTextToken,
            'user' => $user->only(['id', 'name', 'email']),
            'empresa_token' => base64_encode(json_encode([
                "empresa_id" => $empresa->getAttribute("empresa_id"),
                "empresa_cnpj" => $empresa->empresa->empresa_cnpj
            ]))
        ];
    }

    /**
     * @throws AutenticacaoException
     */
    private function checaSeSenhaConfere(array $credenciais): User|AutenticacaoException {
        $user = $this->usuarioRepository->usuarioPorEmail($credenciais['email']);
        if (!Hash::check($credenciais['password'], $user->getAttribute('password'))) return AutenticacaoException::senhaInvalida();
        return $user;
    }
}
