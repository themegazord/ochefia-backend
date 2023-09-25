<?php

namespace App\Services\Estoque\Produto;

use App\Exceptions\ProdutoException;
use App\Models\Produto;
use App\Repositories\Interfaces\Estoque\Produto\IProduto;
use Illuminate\Database\Eloquent\Collection;

class ProdutoService
{
    public function __construct(
        private readonly IProduto $produtoRepository
    )
    {

    }

    public function cadastro(array $produto): Produto
    {
        return $this->produtoRepository->cadastro($produto);
    }

    public function listagemProdutosPorEmpresa(object $empresa): Collection {
        return $this->produtoRepository->listagemProdutos($empresa);
    }

    /**
     * @throws ProdutoException
     */
    public function consultaProduto(object $empresa, string $produto_id): Produto|ProdutoException {
        $produto = $this->produtoRepository->consultaProduto($empresa, $produto_id);
        return is_null($produto) ? ProdutoException::produtoInexistente() : $produto;
    }
}
