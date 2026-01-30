<?php

namespace App\Service;

use App\DTOs\EntregaDTO;
use App\Mapper\EntregaMapper;
use App\Models\Entrega;
use Illuminate\Http\Request;

class EntregaService
{
   public function buscarTodasEntregas(){
       return Entrega::all()->map(fn(Entrega $entrega) => EntregaMapper::toDto($entrega));
   }

   public function criarEntrega(EntregaDTO $dto): EntregaDTO
   {
       $entrega =  EntregaMapper::toModel($dto);
       $entrega->save();

       return EntregaMapper::toDto($entrega);
   }

   public function buscarEntregaPorId(int $idEntrega): EntregaDTO
   {
    $entrega = Entrega::findOrFail($idEntrega);
    return EntregaMapper::toDto($entrega);
   }

    public function atualizarEntregaPorId(int $idEntrega, array $dados): EntregaDTO
    {
        $entrega = Entrega::findOrFail($idEntrega);

        $entrega->update($dados);

        return EntregaMapper::toDto($entrega);
    }

   public function deletarEntregaPorId(int $idEntrega): bool
   {
       return (bool) Entrega::destroy($idEntrega);
   }


}
