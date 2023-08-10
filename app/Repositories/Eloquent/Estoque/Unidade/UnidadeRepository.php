<?php

namespace App\Repositories\Eloquent\Estoque\Unidade;

use App\Models\Unidade;
use App\Repositories\Interfaces\Estoque\Unidade\IUnidade;

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
