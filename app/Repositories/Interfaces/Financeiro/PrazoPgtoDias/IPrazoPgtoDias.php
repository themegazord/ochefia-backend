<?php

namespace App\Repositories\Interfaces\Financeiro\PrazoPgtoDias;

use App\Models\PrazoPgtoDias;
use Illuminate\Database\Eloquent\Collection;

interface IPrazoPgtoDias
{
    public function cadastro(array $prazoPgtoDias): PrazoPgtoDias;
    public function consultaPrazoPgtoDiasPorEmpresa(object $empresa, string $prazopgto_id ): Collection;
    public function deletePrazoPgtoDiasPorEmpresa(object $empresa, string $prazopgto_id): mixed;
}
