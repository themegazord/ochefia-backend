<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormaPgto extends Model
{
    use HasFactory;

    protected $table = 'forma_pgto';

    protected $fillable = [
        'empresa_id',
        'formapgto_nome',
        'formapgto_tipo',
        'clientes_id',
        'prazopgto_id'
    ];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'clientes_id', 'clientes_id');
    }
}
