<?php

namespace App\Service;

use App\DTOs\SetorDTO;
use App\Mapper\SetorMapper;
use App\Models\Setor;
use App\Models\Unidade;

class SetorService
{

    public function buscarTodosSetores(){
        return Setor::all()->map(fn(Setor $setor) => SetorMapper::toDto($setor));
    }

    public function criarSetor(SetorDTO $dto): SetorDTO
    {
        Unidade::findOrFail($dto->unidadeId);

        $setor = SetorMapper::toModel($dto);
        $setor->save();

        return SetorMapper::toDto($setor);
    }

    public function buscarSetorPorId(int $id): SetorDTO
    {
        $setor = Setor::findOrFail($id);
        return SetorMapper::toDto($setor);
    }

    public function atualizarSetor(array $dados, int $id): SetorDTO
    {
        $setor = Setor::findOrFail($id);
        $setor->update($dados);

        return SetorMapper::toDto($setor);
    }


    public function deletarSetor(int $id): bool
    {
        return (bool) Setor::destroy($id);
    }

}
