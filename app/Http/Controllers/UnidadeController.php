<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarUnidadeRequest;
use App\Mapper\UnidadeMapper;
use App\Models\Unidade;
use App\Service\UnidadeService;

class UnidadeController extends Controller
{

    public function __construct(
        private UnidadeService $unidadeService
    ){}


    public function buscarTodasUnidade(){
        return response()->json($this->unidadeService->buscarTodasUnidades());
    }

    public function criarUnidade(CriarUnidadeRequest $request){
        $unidade = $this->unidadeService->criarUnidade($request->validated());
        return response()->json($unidade, 201);
    }

    public function buscarUnidadePorId(int $id){
        return response()->json($this->unidadeService->buscarUnidadePorId($id));
    }

    public function atualizarUnidade(CriarUnidadeRequest $request, int $id)
    {
        $unidade = $this->unidadeService->atualizarUnidade($id, $request->validated());

        $dto = UnidadeMapper::toDto($unidade);

        return response()->json($dto, 200);
    }



    public function deletarUnidade(int $id){
        $this->unidadeService->deletarUnidade($id);
        return response()->json(null, 200);
    }

}
