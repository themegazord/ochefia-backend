<?php

namespace App\Repositories\Interfaces\Estoque\Fornecedor;

use App\Models\FornecedorProduto;

interface IFornecedorProduto
{
    public function cadastro(array $fornecedorProduto): FornecedorProduto;
    public function fornecedorProdutoPorNome(string $nomeFornecedorProduto): ?FornecedorProduto;
}
