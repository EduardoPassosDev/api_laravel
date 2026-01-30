<?php

namespace App\Service;

use App\DTOs\UnidadeDTO;
use App\Mapper\UnidadeMapper;
use App\Models\Unidade;

class UnidadeService
{
    public function buscarTodasUnidades(){
        return Unidade::all()->map(fn(Unidade $unidade) => UnidadeMapper::toDto($unidade));
    }

    public function criarUnidade(array $dados): UnidadeDTO
    {
        $dto = new UnidadeDTO(
            nome: $dados['nome'],
            sigla: $dados['sigla'] ?? null
        );

        $unidade = UnidadeMapper::toModel($dto);
        $unidade->save();

        return UnidadeMapper::toDto($unidade);
    }

    public function buscarUnidadePorId(int $id): UnidadeDTO{
        $unidade = Unidade::findOrFail($id);
        return UnidadeMapper::toDto($unidade);
    }

    public function atualizarUnidade(int $id, array $data): Unidade
    {
        $dto = UnidadeMapper::fromArray($data);
        $unidade = Unidade::findOrFail($id);

        $unidade->update([
            'nome' => $dto->nome,
            'sigla' => $dto->sigla,
        ]);

        return $unidade->fresh();
    }


    public function deletarUnidade(int $id): bool{
        return (bool) Unidade::destroy($id);
    }



}
