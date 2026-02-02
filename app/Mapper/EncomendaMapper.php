<?php

namespace App\Mapper;

use App\DTOs\EncomendaDTO;
use App\Models\Encomenda;

class EncomendaMapper
{

    public static function toModel(EncomendaDTO $encomendaDTO): Encomenda
    {
        return new Encomenda(
            [
                'setor_id' => $encomendaDTO->setor_id,
                'unidade_id' => $encomendaDTO->unidade_id,
                'nome_completo' => $encomendaDTO->nome_completo,
                'descricao' => $encomendaDTO->descricao,
                'is_coletado' => $encomendaDTO->is_coletado]);
    }

    public static function toDto(Encomenda $encomenda): EncomendaDTO
    {
        return new EncomendaDTO(
            id: $encomenda->id ?? 0,
            setor_id: $encomenda->setor_id,
            unidade_id: $encomenda->unidade_id,
            nome_completo: $encomenda->nome_completo,
            descricao: $encomenda->descricao,
            is_coletado: $encomenda->is_coletado
        );
    }

}
