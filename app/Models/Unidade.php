<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{

    protected $table = 'unidade';
    protected $fillable =[
        'nome',
        'sigla',
    ];


    public function setores(): HasMany
    {
        return $this->hasMany(Setor::class);
    }
}
