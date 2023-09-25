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

    public function consultaProduto(object $empresa, string $produto_id): ?Produto
    {
        return Produto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('produto_id', $produto_id)
            ->first([
                'empresa_id',
                'grupo_produto_id',
                'sub_grupo_produto_id',
                'fabricante_produto_id',
                'classe_produto_id',
                'unidade_id',
                'produto_nome',
                'produto_estoque',
                'produto_preco'
            ]);
    }

    public function edicaoProduto(array $produto, object $empresa, string $produto_id): int
    {
        return Produto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('produto_id', $produto_id)
            ->update($produto);
    }
}
