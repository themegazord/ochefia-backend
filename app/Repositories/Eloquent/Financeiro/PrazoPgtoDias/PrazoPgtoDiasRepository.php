<?php

namespace App\Repositories\Eloquent\Financeiro\PrazoPgtoDias;

use App\Models\PrazoPgtoDias;
use App\Repositories\Interfaces\Financeiro\PrazoPgtoDias\IPrazoPgtoDias;

class PrazoPgtoDiasRepository implements IPrazoPgtoDias
{

    public function cadastro(array $prazoPgtoDias): PrazoPgtoDias
    {
        return PrazoPgtoDias::query()
            ->create($prazoPgtoDias);
    }
}
