<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco_rua',
        'endereco_numero',
        'endereco_complemento',
        'endereco_cep',
        'endereco_bairro',
        'endereco_cidade',
    ];

    public function funcionario(): HasOne {
        return $this->hasOne(Funcionario::class, 'endereco_id', 'endereco_id');
    }
}
