<?php

namespace App\Repositories\Eloquent\GrupoProduto;

use App\Models\GrupoProduto;
use App\Repositories\Interfaces\GrupoProduto\IGrupoProduto;

class GrupoProdutoRepository implements IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto
    {
        return GrupoProduto::query()
            ->create($grupoProduto);
    }
}
