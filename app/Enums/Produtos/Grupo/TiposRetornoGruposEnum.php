<?php

namespace App\Enums\Produtos\Grupo;

enum TiposRetornoGruposEnum:string
{
    case F = 'Produto Final';
    case M = 'Matéria Prima';
    case E = 'Embalagem';
    case S = 'Serviços';
    case O = 'Outros';
}
