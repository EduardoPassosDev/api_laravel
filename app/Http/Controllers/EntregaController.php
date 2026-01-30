<?php

namespace App\Http\Controllers;

use App\DTOs\EntregaDTO;
use App\Http\Requests\CriarEntregaRequest;
use App\Service\EntregaService;

class EntregaController extends Controller
{

    public function __construct(
        private EntregaService $entregaService
    )
    {}

    public function buscarTodasEntregas()
    {
        return response()->json($this->entregaService->buscarTodasEntregas());
    }

    public function criarEntrega(CriarEntregaRequest $request){
        $dto = EntregaDTO::fromArray($request->validated());

        $entrega = $this->entregaService->criarEntrega($dto);

        return response()->json($entrega, 201);
    }

    public function buscarEntregaPorId(int $entregaId)
    {
        $dto = $this->entregaService->buscarEntregaPorId($entregaId);

        return response()->json($dto, 200);
    }

    public function atualizarEntrega(CriarEntregaRequest $request, int $id){
        $entrega = $this->entregaService->atualizarEntregaPorId($id, $request->validated());

        return response()->json($entrega, 200);
    }

    public function deletarEntrega(int $id){
        $this->entregaService->deletarEntregaPorId($id);
        return response()->json(null, 200);
    }
}
