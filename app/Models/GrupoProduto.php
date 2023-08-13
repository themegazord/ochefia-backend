<?php

namespace App\Models;

use App\Enums\Produtos\Grupo\TiposGruposEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoProduto extends Model
{
    use HasFactory;

    protected $table = 'grupo_produtos';

    protected $fillable = [
        'grupo_produto_nome',
        'grupo_produto_tipo'
    ];

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'grupo_produto_id', 'grupo_produto_id');
    }
}
