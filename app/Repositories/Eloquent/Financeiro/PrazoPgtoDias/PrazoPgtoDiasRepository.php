<?php

namespace App\Repositories\Eloquent\Financeiro\PrazoPgtoDias;

use App\Models\PrazoPgtoDias;
use App\Repositories\Interfaces\Financeiro\PrazoPgtoDias\IPrazoPgtoDias;
use Illuminate\Database\Eloquent\Collection;

class PrazoPgtoDiasRepository implements IPrazoPgtoDias
{

    public function cadastro(array $prazoPgtoDias): PrazoPgtoDias
    {
        return PrazoPgtoDias::query()
            ->create($prazoPgtoDias);
    }

    public function consultaPrazoPgtoDiasPorEmpresa(object $empresa, $prazopgto_id): Collection
    {
        return PrazoPgtoDias::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('prazopgto_id', $prazopgto_id)
            ->get([
                'empresa_id',
                'prazopgto_dias_id',
                'prazopgto_id',
                'dias'
            ]);
    }

    public function deletePrazoPgtoDiasPorEmpresa(object $empresa, string $prazopgto_id): mixed
    {
        return PrazoPgtoDias::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('prazopgto_id', $prazopgto_id)
            ->delete();
    }
}
