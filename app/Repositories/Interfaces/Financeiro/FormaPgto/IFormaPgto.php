<?php

namespace App\Repositories\Interfaces\Financeiro\FormaPgto;

use App\Models\FormaPgto;
use Illuminate\Database\Eloquent\Collection;

interface IFormaPgto
{
    public function cadastro(array $formaPgto): FormaPgto;
    public function listagemFormasPgtoPorEmpresa(object $empresa): Collection;
    public function consultaFomaPgtoPorEmpresa(object $empresa, string $id): ?FormaPgto;
    public function editaFormaPgtoPorEmpresa(array $formaPgto, object $empresa, string $id): int;
}
