<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGrupoProduto extends Model
{
    use HasFactory;

    protected $table = 'sub_grupo_produtos';

    protected $fillable = [
        'sub_grupo_produto_nome'
    ];
}
