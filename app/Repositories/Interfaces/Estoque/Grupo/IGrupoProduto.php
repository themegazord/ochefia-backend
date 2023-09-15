<?php

namespace App\Repositories\Interfaces\Estoque\Grupo;

use App\Models\GrupoProduto;

interface IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto;
    public function grupoProdutoPorNome(string $grupoNome): ?GrupoProduto;

    public function listagemTotalGrupo(): \Illuminate\Database\Eloquent\Collection;
}
