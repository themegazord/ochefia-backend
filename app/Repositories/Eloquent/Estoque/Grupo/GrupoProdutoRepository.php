<?php

namespace App\Repositories\Eloquent\Estoque\Grupo;

use App\Models\GrupoProduto;
use App\Repositories\Interfaces\Estoque\Grupo\IGrupoProduto;

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
}
