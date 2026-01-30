<?php

namespace App\DTOs;

class UnidadeDTO
{
    public function __construct(
        public string $nome,
        public ?string $sigla
    ) {}
}
