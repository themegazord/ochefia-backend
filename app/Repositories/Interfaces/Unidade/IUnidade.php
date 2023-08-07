<?php

namespace App\Repositories\Interfaces\Unidade;

use App\Models\Unidade;

interface IUnidade
{
    public function cadastro(array $unidade): Unidade;
    public function unidadePorNome(string $unidade_nome): ?Unidade;
}
