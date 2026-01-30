<?php

namespace App\Http\Controllers;

use App\DTOs\EncomendaDTO;
use App\DTOs\EntregaDTO;
use App\Http\Requests\CriarEncomendaRequest;
use App\Models\Encomenda;
use App\Service\EncomendaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EncomendaController extends Controller
{

    public function __construct(
        private EncomendaService $encomendaService){}

    public function buscarTodasEncomendas(){
        return response()->json($this->encomendaService->buscarTodasEncomendas());
    }

    public function criarEncomenda(CriarEncomendaRequest $request){
        $dtoEncomenda = EncomendaDTO::fromArray($request->validated());

        $entrega = $this->encomendaService->criarEncomenda($dtoEncomenda);

        return response()->json($entrega, 201);
    }


    public function buscarEntregaPorId(int $idEntrega){
        $dto = $this->encomendaService->buscarEncomendaPorId($idEntrega);

        return response()->json($dto, 200);
    }

    public function atualizarEncomenda(CriarEncomendaRequest $request, int $idEncomenda){
        $encomenda = $this->encomendaService->atualizarEncomendaPorId($idEncomenda, $request->validated());
        return response()->json($encomenda, 201);
    }

    public function deletarEncomenda(int $idEncomenda){
        $this->encomendaService->deletarEncomendaPorId($idEncomenda);
        return response()->json(null, 200);
    }

}
