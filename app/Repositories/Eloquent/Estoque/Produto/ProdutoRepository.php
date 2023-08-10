<?php

namespace App\Repositories\Eloquent\Estoque\Produto;

use App\Models\Produto;
use App\Repositories\Interfaces\Estoque\Produto\IProduto;

class ProdutoRepository implements IProduto
{

    public function cadastro(array $produto): Produto
    {
        return Produto::query()
            ->create($produto);
    }
}
