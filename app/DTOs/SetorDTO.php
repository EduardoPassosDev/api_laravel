<?php

namespace App\DTOs;

use App\Models\Unidade;

class SetorDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $sigla,
        public readonly int $unidadeId
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            nome: $data['nome'],
            sigla: $data['sigla'],
            unidadeId: $data['unidade_id']
        );
    }

}
