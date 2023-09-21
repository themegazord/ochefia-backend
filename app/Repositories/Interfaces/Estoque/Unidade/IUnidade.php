<?php

namespace App\Repositories\Interfaces\Estoque\Unidade;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Collection;

interface IUnidade
{
    public function cadastro(array $unidade): Unidade;
    public function unidadePorNome(string $unidade_nome): ?Unidade;
    public function listagemUnidade(): Collection;
}
