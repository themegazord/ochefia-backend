<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_nome',
        'empresa_cnpj',
        'empresa_descricao',
        'empresa_logo'
    ];

    public function funcionario(): HasOne {
        return $this->hasOne(Funcionario::class, 'empresa_id', 'empresa_id');
    }

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'empresa_id', 'empresa_id');
    }
}
