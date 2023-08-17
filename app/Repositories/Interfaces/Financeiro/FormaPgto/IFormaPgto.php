<?php

namespace App\Repositories\Interfaces\Financeiro\FormaPgto;

use App\Models\FormaPgto;

interface IFormaPgto
{
    public function cadastro(array $formaPgto): FormaPgto;
}
