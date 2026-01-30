<?php

namespace App\DTOs;

class EntregaDTO
{
    public function __construct(
        public string         $recebido_por,
        public EntregaTamanho $tamanho_pacote,
        public string         $descricao
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            recebido_por: $data['recebido_por'],
            tamanho_pacote: EntregaTamanho::from($data['tamanho_pacote']),
            descricao: $data['descricao'] ?? null
        );
    }
}
