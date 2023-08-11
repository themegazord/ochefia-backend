<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPgto extends Model
{
    use HasFactory;

    protected $table = 'forma_pgto';

    protected $fillable = [
        'formapgto_nome',
        'formapgto_tipo',
        'clientes_id',
        'prazopgto_id'
    ];
}
