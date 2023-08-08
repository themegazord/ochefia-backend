<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseProduto extends Model
{
    use HasFactory;

    protected $table = 'classe_produto';

    protected $fillable = [
        'classe_produto_nome'
    ];
}
