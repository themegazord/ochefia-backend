<?php

namespace App\Repositories\Interfaces\Financeiro\PrazoPgto;

use App\Models\PrazoPgto;

interface IPrazoPgto
{
    public function cadastro(array $prazoPgto): PrazoPgto;
}
