<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'unidade_nome'
    ];

    public function produto(): HasMany {
        return $this->hasMany(Produto::class, 'unidade_id', 'unidade_id');
    }
}
