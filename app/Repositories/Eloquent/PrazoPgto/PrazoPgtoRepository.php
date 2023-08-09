<?php

namespace App\Repositories\Eloquent\PrazoPgto;

use App\Models\PrazoPgto;
use App\Repositories\Interfaces\PrazoPgto\IPrazoPgto;

class PrazoPgtoRepository implements IPrazoPgto
{

    public function cadastro(array $prazoPgto): PrazoPgto
    {
        return PrazoPgto::query()
            ->create($prazoPgto);
    }
}
