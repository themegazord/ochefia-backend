<?php

namespace App\Repositories\Eloquent\Estoque\Grupo;

use App\Models\GrupoProduto;
use App\Repositories\Interfaces\Estoque\Grupo\IGrupoProduto;
use Illuminate\Database\Eloquent\Collection;

class GrupoProdutoRepository implements IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto
    {
        return GrupoProduto::query()
            ->create($grupoProduto);
    }

    public function grupoProdutoPorNome(string $grupoNome): ?GrupoProduto
    {
        return GrupoProduto::query()
            ->where('grupo_produto_nome', $grupoNome)
            ->first();
    }

    public function listagemTotalGrupo(): \Illuminate\Database\Eloquent\Collection
    {
        return GrupoProduto::query()
            ->get([
                'grupo_produto_id',
                'grupo_produto_nome',
                'grupo_produto_tipo'
            ]);
    }

    public function grupoPorId(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return GrupoProduto::query()
            ->where('grupo_produto_id', $id)
            ->get([
                'grupo_produto_id',
                'grupo_produto_nome',
                'grupo_produto_tipo'
            ]);
    }

    public function edicaoGrupoPorId(array $grupo, int $id): int
    {
        return GrupoProduto::query()
            ->where('grupo_produto_id', $id)
            ->update($grupo);
    }

    public function deletaGrupoPorId(int $id): mixed
    {
        return GrupoProduto::query()
            ->where('grupo_produto_id', $id)
            ->delete();
    }
}
