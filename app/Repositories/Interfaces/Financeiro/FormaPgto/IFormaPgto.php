<?php

namespace App\Repositories\Interfaces\Financeiro\FormaPgto;

use App\Models\FormaPgto;
use Illuminate\Database\Eloquent\Collection;

interface IFormaPgto
{
    public function cadastro(array $formaPgto): FormaPgto;
    public function listagemFormasPgtoPorEmpresa(object $empresa): Collection;
}
