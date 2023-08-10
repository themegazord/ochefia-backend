<?php

namespace App\Repositories\Interfaces\Estoque\Produto;

use App\Models\Produto;

interface IProduto
{
    public function cadastro(array $produto): Produto;
}
