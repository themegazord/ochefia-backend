<?php

namespace App\Repositories\Interfaces\Financeiro\PrazoPgto;

use App\Models\PrazoPgto;
use Illuminate\Database\Eloquent\Collection;

interface IPrazoPgto
{
    public function cadastro(array $prazoPgto): PrazoPgto;
    public function listagemPrazoPgto(object $empresa): Collection;
}
