<?php

namespace App\Models;

use App\Enums\Produtos\Grupo\TiposGruposEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoProduto extends Model
{
    use HasFactory;

    protected $table = 'grupo_produtos';

    protected $fillable = [
        'grupo_produto_nome',
        'grupo_produto_tipo'
    ];

    protected $casts = [
        'grupo_produto_tipo' => TiposGruposEnum::class
    ];
}
