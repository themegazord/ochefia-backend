<?php

namespace App\Enums\Produtos\Grupo;

enum TiposGruposEnum:string
{
    case PRODUTO_FINAL = 'produto_final';
    case MATERIA_PRIMA = 'materia_prima';
    case EMBALAGEM = 'embalagem';
    case SERVICOS = 'servicos';
    case OUTROS = 'outros';
}
