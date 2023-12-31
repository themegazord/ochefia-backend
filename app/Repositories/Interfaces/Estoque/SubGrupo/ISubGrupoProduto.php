<?php

namespace App\Repositories\Interfaces\Estoque\SubGrupo;

use App\Models\SubGrupoProduto;
use Illuminate\Database\Eloquent\Collection;

interface ISubGrupoProduto
{
    public function cadastro(array $subGrupo): SubGrupoProduto;
    public function subGrupoPorNome(string $nomeSubGrupo): ?SubGrupoProduto;
    public function listagem(): Collection;
    public function subGrupoPorId(string $id): ?SubGrupoProduto;
    public function atualizaSubGrupoPorId(array $subgrupo, int $id): int;
    public function remocaoSubGrupoPorId(int $id): mixed;
}
