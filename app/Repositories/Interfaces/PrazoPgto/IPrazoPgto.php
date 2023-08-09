<?php

namespace App\Repositories\Interfaces\PrazoPgto;

use App\Models\PrazoPgto;

interface IPrazoPgto
{
    public function cadastro(array $prazoPgto): PrazoPgto;
}
