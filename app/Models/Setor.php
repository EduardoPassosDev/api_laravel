<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setor extends Model
{
    protected $table = 'setor';
    protected $fillable = [
        'nome',
        'unidade_id',
        'sigla'
    ];

    protected function unidade(): BelongsTo
{
        return $this->belongsTo(Unidade::class);
}
}
