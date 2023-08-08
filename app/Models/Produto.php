<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'grupo_produto_id',
        'sub_grupo_produto_id',
        'fornecedor_produto_id',
        'classe_produto_id',
        'unidade_id',
        'produto_nome',
        'produto_estoque',
        'produto_preco'
    ];

    public function empresa(): BelongsTo {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'empresa_id');
    }
    public function grupoProduto(): BelongsTo {
        return $this->belongsTo(GrupoProduto::class, 'grupo_produto_id', 'grupo_produto_id');
    }

    public function subGrupoProduto(): BelongsTo {
        return $this->belongsTo(SubGrupoProduto::class, 'sub_grupo_produto_id', 'sub_grupo_produto_id');
    }

    public function fornecedorProduto(): BelongsTo {
        return $this->belongsTo(FornecedorProduto::class, 'fornecedor_produto_id', 'fornecedor_produto_id');
    }

    public function classeProduto(): BelongsTo {
        return $this->belongsTo(ClasseProduto::class, 'classe_produto_id', 'classe_produto_id');
    }

    public function unidade(): BelongsTo {
        return $this->belongsTo(Unidade::class, 'unidade_id', 'unidade_id');
    }
}
