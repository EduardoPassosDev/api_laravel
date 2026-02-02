<?php

namespace App\Mapper;

use App\DTOs\UserDTO;
use App\Models\User;

class UserMapper
{

    public static function toModel(UserDTO $dto): User
    {
        $user = new User();
        $user->name = $dto->name;
        $user->email = $dto->email;
        $user->password = $dto->password ?? null;
        return $user;
    }

    public static function toDto(User $user): UserDTO
    {
        return new UserDTO([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

}
