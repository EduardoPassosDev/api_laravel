<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarUsuarioRequest;
use Illuminate\Http\Request;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function __construct(
        private UserService $userService
    ){}

    public function buscarTodosUsuarios(){
        return response()->json($this->userService->buscarTodosUsuarios());
    }

    public function criarUsuario(CriarUsuarioRequest $request): JsonResponse
    {
        $usuario = $this->userService->criarUsuario($request->validated());
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $token = $this->userService->login(
            $request->email,
            $request->password
        );

        return response()->json([
            'token' => $token,
            'type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $this->userService->logout($request->user());

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }

    public function logoutAll(Request $request)
    {
        $this->userService->logoutAll($request->user());

        return response()->json([
            'message' => 'Logout realizado em todos os dispositivos'
        ]);
    }

}
