<?php

namespace App\Repositories\Interfaces\Estoque\Grupo;

use App\Models\GrupoProduto;
use Illuminate\Database\Eloquent\Collection;

interface IGrupoProduto
{
    public function cadastro(array $grupoProduto): GrupoProduto;
    public function grupoProdutoPorNome(string $grupoNome): ?GrupoProduto;

    public function listagemTotalGrupo(): Collection;

    public function grupoPorId(int $id): Collection;

    public function edicaoGrupoPorId(array $grupo, int $id): int;
}
