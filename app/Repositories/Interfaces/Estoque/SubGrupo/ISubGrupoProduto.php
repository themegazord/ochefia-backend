<?php

namespace App\Repositories\Interfaces\Estoque\SubGrupo;

use App\Models\SubGrupoProduto;

interface ISubGrupoProduto
{
    public function cadastro(array $subGrupo): SubGrupoProduto;
    public function subGrupoPorNome(string $nomeSubGrupo): ?SubGrupoProduto;
}
