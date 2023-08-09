<?php

namespace App\Enums\Financeiro\PrazoPgto;

enum TiposPrazoPgtoEnum:string
{
    case A_VISTA = 'V';
    case A_PRAZO = 'P';
    case ESPECIFICAR = 'E';
}
