<?php

namespace App\Services\Autenticacao;

use App\Exceptions\AutenticacaoException;
use App\Models\User;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CadastroService {
    public function __construct(private IUsuario $usuarioRepository)
    {

    }

    public function cadastro(array $credenciais): User|AutenticacaoException {
        if ((bool)$this->usuariosPorEmail($credenciais['email'])) return AutenticacaoException::emailJaVinculadoAUmUsuario();
        $credenciais['password'] = Hash::make($credenciais['password']);
        return $this->usuarioRepository->cadastro($credenciais);
    }

    private function usuariosPorEmail(string $email): Model|null {
        return $this->usuarioRepository->usuarioPorEmail($email);
    }
}
