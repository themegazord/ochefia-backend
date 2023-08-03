<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'endereco_id',
        'funcionario_nome',
        'funcionario_email',
        'cargo',
        'acessos',
    ];

    public function endereco(): BelongsTo {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'endereco_id');
    }

    public function empresa(): BelongsTo {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'empresa_id');
    }
}