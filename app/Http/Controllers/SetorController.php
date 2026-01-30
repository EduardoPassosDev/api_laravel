<?php

namespace App\Http\Controllers;

use App\DTOs\SetorDTO;
use App\Http\Requests\CriarSetorRequest;
use App\Service\SetorService;
use App\Service\UnidadeService;
use Symfony\Component\Routing\Exception\InvalidArgumentException;

class SetorController extends Controller
{

    public function __construct(
        private SetorService $setorService
    )
    {}

    public function buscarTodosSetores()
    {
        return response()->json($this->setorService->buscarTodosSetores());
    }

    public function criarSetor(CriarSetorRequest $request)
    {
        $dto = SetorDTO::fromArray($request->validated());

        $setor = $this->setorService->criarSetor($dto);

        return response()->json($setor, 201);
    }

    public function buscarSetorPorId(int $setorId){
        return response()->json($this->setorService->buscarSetorPorId($setorId));
    }

    public function atualizarSetor(CriarSetorRequest $setorService, int $id){
        $setor = $this->setorService->atualizarSetor($setorService->validated(), $id);

        return response()->json($setor, 200);
    }

    public function deletarSetor(int $id){
        $this->setorService->deletarSetor($id);
        return response()->json(null, 200);
    }

}
