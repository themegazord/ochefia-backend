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

    /**
     * @throws ProdutoException
     */
    public function edicaoProduto(array $produto, object $empresa, string $produto_id): int|ProdutoException {
        if (is_null($this->produtoRepository->consultaProduto($empresa, $produto_id))) return ProdutoException::produtoInexistente();
        if ($produto['empresa_id'] != $empresa->empresa_id) return ProdutoException::produtoNaoExisteNaEmpresa();
        return $this->produtoRepository->edicaoProduto($produto, $empresa, $produto_id);
    }

    /**
     * @throws ProdutoException
     */
    public function remocaoProduto(object $empresa, string $produto_id): mixed {
        // TODO: adicionar futuramente validação se o produto tem movimentação ou não
        if (is_null($this->produtoRepository->consultaProduto($empresa, $produto_id))) return ProdutoException::produtoInexistente();
        return $this->produtoRepository->remocaoProduto($empresa, $produto_id);
    }
}
