<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrazoPgtoDias extends Model
{
    use HasFactory;

    protected $table = 'prazo_pgto_dias';

    protected $fillable = [
        'prazopgto_id',
        'dias'
    ];

    public function prazoPgto(): BelongsTo
    {
        return $this->belongsTo(PrazoPgto::class, 'prazopgto_id', 'prazopgto_id');
    }

    public function empresas(): BelongsTo {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'empresa_id');
    }
}
