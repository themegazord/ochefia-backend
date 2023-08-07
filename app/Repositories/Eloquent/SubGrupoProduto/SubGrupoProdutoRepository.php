<?php

namespace App\Repositories\Eloquent\SubGrupoProduto;

use App\Models\SubGrupoProduto;
use App\Repositories\Interfaces\SubGrupoProduto\ISubGrupoProduto;
use Illuminate\Database\Eloquent\Model;

class SubGrupoProdutoRepository implements ISubGrupoProduto
{

    public function cadastro(array $subGrupo): SubGrupoProduto
    {
        return SubGrupoProduto::query()
            ->create($subGrupo);
    }

    public function subGrupoPorNome(string $nomeSubGrupo): ?SubGrupoProduto
    {
        return SubGrupoProduto::query()
            ->where('sub_grupo_produto_nome', $nomeSubGrupo)
            ->first();
    }
}
