<?php

namespace App\Repositories\Interfaces\Autenticacao;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface IUsuario {
    public function cadastro(array $credenciais): User;
    public function usuarioPorEmail(string $email): User|null;
}
