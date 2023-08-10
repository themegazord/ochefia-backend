<?php

namespace App\Services\Estoque\Produto;

use App\Models\Produto;
use App\Repositories\Interfaces\Produto\IProduto;

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
}
