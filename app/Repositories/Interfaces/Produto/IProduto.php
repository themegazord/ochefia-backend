<?php

namespace App\Repositories\Interfaces\Produto;

use App\Models\Produto;

interface IProduto
{
    public function cadastro(array $produto): Produto;
}
