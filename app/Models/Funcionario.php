<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'empresa_id',
        'endereco_id',
        'funcionario_nome',
        'funcionario_email',
        'funcionario_senha',
        'cargo',
        'acessos',
    ];

    protected $hidden = [
        'funcionario_senha'
    ];

    public function endereco(): BelongsTo {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'endereco_id');
    }

    public function empresa(): BelongsTo {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'empresa_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
}
