<?php

namespace App\Repositories\Interfaces\Estoque\Produto;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;

interface IProduto
{
    public function cadastro(array $produto): Produto;
    public function listagemProdutos(object $empresa): Collection;
    public function consultaProduto(object $empresa, string $produto_id): ?Produto;
    public function edicaoProduto(array $produto, object $empresa, string $produto_id): int;
}
