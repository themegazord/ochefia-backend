<?php

namespace App\Repositories\Eloquent\Autenticacao;

use App\Models\User;
use App\Repositories\Interfaces\Autenticacao\IUsuario;
use Illuminate\Database\Eloquent\Model;

class UsuarioRepository implements IUsuario {
    public function cadastro(array $credenciais): User
    {
        return User::query()
            ->create($credenciais);
    }

    public function usuarioPorEmail(string $email): User|null
    {
        return User::query()
            ->where('email', $email)
            ->first();
    }
}
