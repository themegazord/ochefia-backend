<?php

namespace App\Enums\Financeiro\FormaPagamento\PrazoPgto;

enum TiposPrazoPgtoEnum:string
{
    case A_VISTA = 'V';
    case A_PRAZO = 'P';
    case ESPECIFICAR = 'E';
}
