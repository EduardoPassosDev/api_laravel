<?php

namespace App\Service;

use App\DTOs\EncomendaDTO;
use App\DTOs\EntregaDTO;
use App\Mapper\EncomendaMapper;
use App\Mapper\EntregaMapper;
use App\Models\Encomenda;

class EncomendaService
{

   public function buscarTodasEncomendas(){
       return Encomenda::all()->map(fn(Encomenda $encomenda) => EncomendaMapper::toDto($encomenda));
   }

   public function criarEncomenda(EncomendaDTO $encomenda): EncomendaDTO{

       $encomenda = EncomendaMapper::toModel($encomenda);
       $encomenda->save();

       return EncomendaMapper::toDto($encomenda);
   }

   public function buscarEncomendaPorId(int $idEncomenda): EntregaDTO {
       $entrega = Encomenda::findOrFail($idEncomenda);
       return EntregaMapper::toDto($entrega);
   }

   public function atualizarEncomendaPorId(int $idEncomenda, array $dados): EncomendaDTO{
       $encomenda = Encomenda::findOrFail($idEncomenda);
       $encomenda->update($dados);

       return EncomendaMapper::toDto($encomenda);
   }

   public function deletarEncomendaPorId(int $idEncomenda){
       return (bool) Encomenda::destroy($idEncomenda);
   }


}
