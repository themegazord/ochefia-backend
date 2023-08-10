<?php

namespace App\Enums\FormaPagamento\PrazoPgto;

enum TiposPrazoPgtoEnum:string
{
    case A_VISTA = 'V';
    case A_PRAZO = 'P';
    case ESPECIFICAR = 'E';
}
