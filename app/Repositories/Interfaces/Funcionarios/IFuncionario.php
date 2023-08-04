<?php

namespace App\Repositories\Interfaces\Funcionarios;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Collection;

interface IFuncionario {
    public function cadastro(array $funcionario): Funcionario;
    public function funcionarioPorEmailEEmpresa(string $email, int $empresa_id): ?Funcionario;
    public function listagemDeFuncionarioPorEmpresa(int $empresa_id): Collection;

    public function listagemDeDonosPorEmpresa(int $empresa_id): Collection;
}
