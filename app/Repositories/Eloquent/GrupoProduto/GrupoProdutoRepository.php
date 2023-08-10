<?php

namespace App\Repositories\Eloquent\GrupoProduto;

use App\Models\GrupoProduto;
use App\Repositories\Interfaces\Estoque\Grupo\IGrupoProduto;

class GrupoProdutoRepository implements IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto
    {
        return GrupoProduto::query()
            ->create($grupoProduto);
    }
}
