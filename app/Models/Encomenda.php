<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encomenda extends Model
{

    protected $table = 'encomenda';
    protected $fillable = [
        'setor_id',
        'descricao',
        'nome_completo',
        'is_coletado',
        'unidade_id'
    ];

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }

    public function setor(): BelongsTo
    {
        return $this->belongsTo(Setor::class);
    }
}
