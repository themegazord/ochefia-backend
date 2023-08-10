<?php

namespace App\Repositories\Interfaces\Financeiro\PrazoPgtoDias;

use App\Models\PrazoPgtoDias;

interface IPrazoPgtoDias
{
    public function cadastro(array $prazoPgtoDias): PrazoPgtoDias;
}
