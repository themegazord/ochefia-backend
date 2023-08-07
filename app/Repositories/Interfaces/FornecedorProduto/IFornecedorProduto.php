<?php

namespace App\Repositories\Interfaces\FornecedorProduto;

use App\Models\FornecedorProduto;

interface IFornecedorProduto
{
    public function cadastro(array $fornecedorProduto): FornecedorProduto;
    public function fornecedorProdutoPorNome(string $nomeFornecedorProduto): ?FornecedorProduto;
}
