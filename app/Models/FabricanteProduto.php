<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FabricanteProduto extends Model
{
    use HasFactory;

    protected $table = 'fabricante_produto';

    protected $fillable = [
        'fabricante_produto_nome'
    ];

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'fornecedor_produto_id', 'fornecedor_produto_id');
    }
}
