<?php

namespace App\Mapper;

use App\DTOs\SetorDTO;
use App\DTOs\UnidadeDTO;
use App\Models\Setor;

class SetorMapper
{

    public static function toModel(SetorDTO $dto): Setor
    {
        return new Setor([
            'nome' => $dto->nome,
            'sigla' => $dto->sigla,
            'unidade_id' => $dto->unidadeId,
        ]);
    }

    public static function toDto(Setor $model): SetorDTO
    {
        return new SetorDTO(
            nome: $model->nome,
            sigla: $model->sigla,
            unidadeId: $model->unidade_id
        );
    }

}
