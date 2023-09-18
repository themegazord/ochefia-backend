<?php

namespace App\Repositories\Eloquent\Estoque\SubGrupo;

use App\Models\SubGrupoProduto;
use App\Repositories\Interfaces\Estoque\SubGrupo\ISubGrupoProduto;
use Illuminate\Database\Eloquent\Collection;

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

    public function listagem(): Collection
    {
        return SubGrupoProduto::query()
            ->get([
                'sub_grupo_produto_id',
                'sub_grupo_produto_nome'
            ]);
    }

    public function subGrupoPorId(string $id): ?SubGrupoProduto
    {
        return SubGrupoProduto::query()
            ->where('sub_grupo_produto_id', $id)
            ->first();
    }

    public function atualizaSubGrupoPorId(array $subgrupo, int $id): int
    {
        return SubGrupoProduto::query()
            ->where('sub_grupo_produto_id', $id)
            ->update($subgrupo);
    }
}
