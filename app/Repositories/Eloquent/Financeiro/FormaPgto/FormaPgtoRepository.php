<?php

namespace App\Repositories\Eloquent\Financeiro\FormaPgto;

use App\Models\FormaPgto;
use App\Repositories\Interfaces\Financeiro\FormaPgto\IFormaPgto;
use Illuminate\Database\Eloquent\Collection;

class FormaPgtoRepository implements IFormaPgto
{

    public function cadastro(array $formaPgto): FormaPgto
    {
        return FormaPgto::query()
            ->create($formaPgto);
    }

    public function listagemFormasPgtoPorEmpresa(object $empresa): Collection
    {
        return FormaPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->get([
                'formapgto_id',
                'formapgto_nome'
            ]);
    }

    public function consultaFomaPgtoPorEmpresa(object $empresa, string $id): ?FormaPgto
    {
        return FormaPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('formapgto_id', $id)
            ->first([
                'formapgto_id',
                'empresa_id',
                'formapgto_nome',
                'formapgto_tipo',
                'clientes_id',
                'prazopgto_id'
            ]);
    }
}
