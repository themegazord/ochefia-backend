<?php

namespace App\Repositories\Eloquent\Estoque\Produto;

use App\Models\Produto;
use App\Repositories\Interfaces\Estoque\Produto\IProduto;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository implements IProduto
{

    public function cadastro(array $produto): Produto
    {
        return Produto::query()
            ->create($produto);
    }

    public function listagemProdutos(object $empresa): Collection
    {
        return Produto::query()
            ->where("empresa_id", $empresa->empresa_id)
            ->get([
                "produto_id",
                "produto_nome",
                "produto_estoque",
                "produto_preco"
            ]);
    }
}
