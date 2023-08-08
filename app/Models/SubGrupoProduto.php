<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubGrupoProduto extends Model
{
    use HasFactory;

    protected $table = 'sub_grupo_produtos';

    protected $fillable = [
        'sub_grupo_produto_nome'
    ];

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'sub_grupo_produto_id', 'sub_grupo_produto_id');
    }
}
