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
                'prazopgto_id',
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]);
    }

    public function consultaPrazoPgtoPorEmpresa(object $empresa, string $prazopgto_id): ?PrazoPgto
    {
        return PrazoPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('prazopgto_id', $prazopgto_id)
            ->first([
                'prazopgto_id',
                'empresa_id',
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]);
    }

    public function edicaoPrazoPgtoPorEmpresa(array $prazopgto, object $empresa, string $prazopgto_id): int
    {
        return PrazoPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('prazopgto_id', $prazopgto_id)
            ->update($prazopgto);
    }

    public function removePrazoPgtoPorEmpresa(object $empresa, string $prazopgto_id): mixed
    {
        return PrazoPgto::query()
            ->where('empresa_id', $empresa->empresa_id)
            ->where('prazopgto_id', $prazopgto_id)
            ->delete();
    }
}
