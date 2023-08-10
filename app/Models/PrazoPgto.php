<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrazoPgto extends Model
{
    use HasFactory;

    protected $table = 'prazo_pgto';

    protected $fillable = [
        'prazopgto_nome',
        'prazopgto_tipo',
        'prazopgto_tipoforma'
    ];

    public function prazoPgtoDias(): HasMany
    {
        return $this->hasMany(PrazoPgtoDias::class, 'prazopgto_id', 'prazopgto_id');
    }
}
