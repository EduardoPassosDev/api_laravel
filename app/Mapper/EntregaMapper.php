<?php

namespace App\Mapper;

use App\DTOs\EntregaDTO;
use App\Enums\EntregaTamanho;
use App\Models\Entrega;

class EntregaMapper
{
    public static function toModel(EntregaDTO $dto): Entrega
    {
        return new Entrega(
            [
                'recebido_por' => $dto->recebido_por,
                'tamanho_pacote' => $dto->tamanho_pacote->value,
                'descricao' => $dto->descricao,
            ]
        );
    }

    public static function toDto(Entrega $entrega): EntregaDTO
    {
        return new EntregaDTO(
            recebido_por: $entrega->recebido_por,
            tamanho_pacote: $entrega->tamanho_pacote,
            descricao: $entrega->descricao
        );
    }
}
