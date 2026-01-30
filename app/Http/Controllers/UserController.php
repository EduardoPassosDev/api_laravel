<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarUsuarioRequest;
use App\Service\UserService;

class UserController extends Controller
{

    public function __construct(
        private UserService $userService
    ){}

    public function buscarTodosUsuarios(){
        return response()->json($this->userService->buscarTodosUsuarios());
    }

    public function criarUsuario(CriarUsuarioRequest $request){
        $usuario = $this->userService->criarUsuario(
            $request->validated()
        );

        return response()->json($usuario, 201);
    }

    public function buscarUsuarioPorId(int $id){
        $usuario = $this->userService->buscarUsuario($id);

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Usuário encontrado',
            'data' => $usuario
        ], 200);
    }


    public function atualizarUsuario(CriarUsuarioRequest $request, int $id){
        $usuario = $this->userService->atualizarUsuario($id, $request->validated());

        return response()->json($usuario, 200);
    }

    public function deletarUsuario(int $id){
        $this->userService->deletarUsuario($id);
        return response()->json(null, 200);
    }

}
