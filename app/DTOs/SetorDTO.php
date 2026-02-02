<?php

namespace App\DTOs;

use App\Models\Unidade;

class SetorDTO
{
    public function __construct(
        public int $id,
        public readonly string $nome,
        public readonly string $sigla,
        public readonly int $unidadeId
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? 0,
            nome: $data['nome'],
            sigla: $data['sigla'],
            unidadeId: $data['unidade_id']
        );
    }

}
