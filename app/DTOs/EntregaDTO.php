<?php

namespace App\DTOs;

use App\Enums\TamanhoPacote;
use InvalidArgumentException;

class EntregaDTO
{
    public function __construct(
        public int $id,
        public string        $recebido_por,
        public TamanhoPacote $tamanho_pacote,
        public ?string       $descricao = null
    ) {
    }

    private static function parseTamanhoPacote(mixed $value): TamanhoPacote
    {
        $value = strtolower(trim((string) $value));

        $enum = TamanhoPacote::tryFrom($value);

        if (! $enum) {
            throw new InvalidArgumentException('Tamanho de pacote inválido');
        }

        return $enum;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? 0,
            recebido_por: trim($data['recebido_por']),
            tamanho_pacote: self::parseTamanhoPacote($data['tamanho_pacote']),
            descricao: $data['descricao'] ?? null
        );
    }
}
