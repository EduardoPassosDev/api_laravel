<?php

namespace App\DTOs;

class UnidadeDTO
{
    public function __construct(
        public int $id,
        public string $nome,
        public ?string $sigla
    ) {}

}
