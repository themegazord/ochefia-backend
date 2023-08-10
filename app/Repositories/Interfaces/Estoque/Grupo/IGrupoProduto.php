<?php

namespace App\Repositories\Interfaces\Estoque\Grupo;

use App\Models\GrupoProduto;

interface IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto;
}
