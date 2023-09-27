<?php

namespace App\Repositories\Interfaces\Financeiro\PrazoPgtoDias;

use App\Models\PrazoPgtoDias;
use Illuminate\Database\Eloquent\Collection;

interface IPrazoPgtoDias
{
    public function cadastro(array $prazoPgtoDias): PrazoPgtoDias;
    public function consultaPrazoPgtoDiasPorEmpresa(object $empresa, $prazopgto_id ): Collection;
}
