<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Encomenda extends Model
{

    protected $fillable = [
        'setor_id',
        'descricao',
        'nome_completo',
        'is_coletado',
        'unidade_id'
    ];

    protected $casts = [
        'is_coletado' => 'boolean',
    ];

   protected function descricao(): Attribute
   {
       return Attribute::make(
           get: fn($value) => mb_strtoupper($value, 'UTF-8'),
           set: fn($value) => trim($value),
       );
   }

   protected function nomeCompleto(): Attribute
   {
       return Attribute::make(
           get: fn($value) => mb_strtoupper($value, 'UTF-8'),
           set: fn($value) => trim($value),
       );
   }



    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }

    public function setor(): BelongsTo
    {
        return $this->belongsTo(Setor::class);
    }
}
