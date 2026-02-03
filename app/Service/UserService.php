<?php

namespace App\Service;

use App\DTOs\UserDTO;
use App\Mapper\UserMapper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function buscarTodosUsuarios()
    {
        return User::all()->map(fn(User $user) => UserMapper::toDto($user));
    }

    public function criarUsuario(array $dados): UserDTO
    {
        $dto = UserDTO::fromArray($dados);

        $user = UserMapper::toModel($dto);
        $user->save();

        return UserMapper::toDto($user);
    }

    public function buscarUsuario(int $id): UserDTO
    {
        $user = User::findOrFail($id);
        return UserMapper::toDto($user);
    }

    public function atualizarUsuario(int $id, array $dados): UserDTO
    {
        $user = User::findOrFail($id);

        if (isset($dados['password'])) {
            $dados['password'] = Hash::make($dados['password']);
        }

        $user->update([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => $dados['password'] ?? $user->password,
        ]);

        return UserMapper::toDto($user);
    }

    public function deletarUsuario(int $id): bool
    {
        return (bool)User::destroy($id);
    }

    public function login(string $email, string $password): string
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas']
            ]);
        }

        // Gera token Sanctum
        return $user->createToken('api-token')->plainTextToken;
    }

    public function logout(User $user): void
    {
        // Remove apenas o token atual
        $user->currentAccessToken()->delete();
    }

    public function logoutAll(User $user): void
    {
        // Remove todos os tokens
        $user->tokens()->delete();
    }


}
