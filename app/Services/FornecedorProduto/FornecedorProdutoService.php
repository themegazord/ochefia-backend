<?php

namespace App\Services\FornecedorProduto;

use App\Exceptions\FornecedorProdutoException;
use App\Models\FornecedorProduto;
use App\Repositories\Interfaces\FornecedorProduto\IFornecedorProduto;

class FornecedorProdutoService
{
    public function __construct(
        private readonly IFornecedorProduto $fornecedorProdutoRepository
    )
    {
    }

    /**
     * @throws FornecedorProdutoException
     */
    public function cadastro(array $fornecedorProduto): FornecedorProduto|FornecedorProdutoException {
        if ($this->consultaFornecedorProdutoPorNome($fornecedorProduto['fornecedor_produto_nome'])) return FornecedorProdutoException::fornecedorProdutoJaExiste($fornecedorProduto['fornecedor_produto_nome']);
        $fornecedorProduto['fornecedor_produto_nome'] = strtoupper($fornecedorProduto['fornecedor_produto_nome']);
        return $this->fornecedorProdutoRepository->cadastro($fornecedorProduto);
    }

    private function consultaFornecedorProdutoPorNome(string $nomeFornecedorProduto): ?FornecedorProduto {
        return $this->fornecedorProdutoRepository->fornecedorProdutoPorNome($nomeFornecedorProduto);
    }
}
