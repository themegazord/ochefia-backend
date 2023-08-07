<?php

namespace App\Repositories\Interfaces\GrupoProduto;

use App\Models\GrupoProduto;

interface IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto;
}
