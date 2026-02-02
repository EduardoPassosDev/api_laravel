<?php

namespace App\DTOs;

class EncomendaDTO
{

    public function __construct(
        public int $id,
        public readonly int    $setor_id,
        public readonly int    $unidade_id,
        public readonly string $nome_completo,
        public readonly string $descricao,
        public readonly bool $is_coletado
    )
    {}

    public static function  fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? 0,
            setor_id: $data['setor_id'],
            unidade_id: $data['unidade_id'],
            nome_completo: $data['nome_completo'],
            descricao: $data['descricao'],
            is_coletado: $data['is_coletado']
        );
    }

}
