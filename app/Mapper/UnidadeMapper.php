<?php

namespace App\Mapper;

use App\DTOs\UnidadeDTO;
use App\Models\Unidade;

class UnidadeMapper
{

    public static function toModel(UnidadeDTO $dto): Unidade
    {
        return new Unidade([
            'nome'  => $dto->nome,
            'sigla' => $dto->sigla,
        ]);
    }

    public static function toDto(Unidade $unidade): UnidadeDTO
    {
        return new UnidadeDTO(
            nome: $unidade->nome,
            sigla: $unidade->sigla
        );
    }

    public static function fromArray(array $data): UnidadeDTO
    {
        return new UnidadeDTO(
            nome: $data['nome'],
            sigla: $data['sigla'] ?? null
        );
    }
}
