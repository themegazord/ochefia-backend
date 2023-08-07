<?php

namespace App\Repositories\Eloquent\FornecedorProduto;

use App\Models\FornecedorProduto;
use App\Repositories\Interfaces\FornecedorProduto\IFornecedorProduto;

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
