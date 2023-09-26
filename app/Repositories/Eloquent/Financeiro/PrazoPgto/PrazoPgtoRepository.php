<?php

namespace App\Repositories\Eloquent\Financeiro\PrazoPgto;

use App\Models\PrazoPgto;
use App\Repositories\Interfaces\Financeiro\PrazoPgto\IPrazoPgto;
use Illuminate\Database\Eloquent\Collection;

class PrazoPgtoRepository implements IPrazoPgto
{

    public function cadastro(array $prazoPgto): PrazoPgto
    {
        return PrazoPgto::query()
            ->create($prazoPgto);
    }

    public function listagemPrazoPgto(object $empresa): Collection
    {
        return PrazoPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->get([
                'empresa_id',
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]);
    }
}
