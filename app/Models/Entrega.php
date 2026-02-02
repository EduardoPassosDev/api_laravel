<?php

namespace App\Models;

use App\Enums\TamanhoPacote;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'recebido_por',
        'tamanho_pacote',
        'descricao'
    ];

    protected $casts = [
        'tamanho_pacote' => TamanhoPacote::class,
    ];

    protected function recebidoPor(): Attribute
    {
        return Attribute::make(
            get: fn($value) => mb_strtoupper($value, 'UTF-8'),
            set: fn($value) => trim($value),
        );
    }

    protected function descricao(): Attribute
    {
        return Attribute::make(
            get: fn($value) => mb_strtoupper($value, 'UTF-8'),
            set: fn($value) => trim($value),
        );
    }

}
