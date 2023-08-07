<?php

namespace App\Repositories\Eloquent\Unidade;

use App\Models\Unidade;
use App\Repositories\Interfaces\Unidade\IUnidade;

class UnidadeRepository implements IUnidade
{

    public function cadastro(array $unidade): Unidade
    {
        return Unidade::query()
            ->create($unidade);
    }

    public function unidadePorNome(string $unidade_nome): ?Unidade
    {
        return Unidade::query()
            ->where('unidade_nome', $unidade_nome)
            ->first();
    }
}
