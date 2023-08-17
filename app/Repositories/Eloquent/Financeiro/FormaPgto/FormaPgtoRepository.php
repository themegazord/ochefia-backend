<?php

namespace App\Repositories\Eloquent\Financeiro\FormaPgto;

use App\Models\FormaPgto;
use App\Repositories\Interfaces\Financeiro\FormaPgto\IFormaPgto;

class FormaPgtoRepository implements IFormaPgto
{

    public function cadastro(array $formaPgto): FormaPgto
    {
        return FormaPgto::query()
            ->create($formaPgto);
    }
}
