<?php

namespace App\Enums\Produtos\Grupo;

enum TiposGruposEnum:string
{
    case PRODUTO_FINAL = 'F';
    case MATERIA_PRIMA = 'M';
    case EMBALAGEM = 'E';
    case SERVICOS = 'S';
    case OUTROS = 'O';
}
