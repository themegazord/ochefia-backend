<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClasseProduto extends Model
{
    use HasFactory;

    protected $table = 'classe_produto';

    protected $fillable = [
        'classe_produto_nome'
    ];

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'classe_produto_id', 'classe_produto_id');
    }
}
