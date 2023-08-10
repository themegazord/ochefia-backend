<?php

namespace App\Repositories\Eloquent\Financeiro\PrazoPgto;

use App\Models\PrazoPgto;
use App\Repositories\Interfaces\Financeiro\PrazoPgto\IPrazoPgto;

class PrazoPgtoRepository implements IPrazoPgto
{

    public function cadastro(array $prazoPgto): PrazoPgto
    {
        return PrazoPgto::query()
            ->create($prazoPgto);
    }
}
