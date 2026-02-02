<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{

    protected $fillable =[
        'nome',
        'sigla',
    ];

    protected function nome(): Attribute
    {
        return Attribute::make(
            get: fn($value) => mb_strtoupper($value, 'UTF-8'),
            set: fn($value) => trim($value),
        );
    }

    protected function sigla(): Attribute
    {
        return Attribute::make(
            get: fn($value) => mb_strtoupper($value, 'UTF-8'),
            set: fn($value) => trim($value),
        );
    }


    public function setores(): HasMany
    {
        return $this->hasMany(Setor::class);
    }
}
