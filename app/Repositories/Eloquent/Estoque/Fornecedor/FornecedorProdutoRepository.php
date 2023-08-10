<?php

namespace App\Repositories\Eloquent\Estoque\Fornecedor;

use App\Models\FornecedorProduto;
use App\Repositories\Interfaces\Estoque\Fornecedor\IFornecedorProduto;

class FornecedorProdutoRepository implements IFornecedorProduto
{

    public function cadastro(array $fornecedorProduto): FornecedorProduto
    {
        return FornecedorProduto::query()
            ->create($fornecedorProduto);
    }

    public function fornecedorProdutoPorNome(string $nomeFornecedorProduto): ?FornecedorProduto
    {
        return FornecedorProduto::query()
            ->where('fornecedor_produto_nome', $nomeFornecedorProduto)
            ->first();
    }
}
