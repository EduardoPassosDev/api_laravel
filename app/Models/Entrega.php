<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entrega';
    protected $fillable = [
        'recebido_por',
        'tamanho_pacote',
        'descricao'
];

}
