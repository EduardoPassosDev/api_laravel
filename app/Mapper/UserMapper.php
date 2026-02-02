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

        if ($dto->password !== null) {
            $user->password = $dto->password;
        }

        return $user;
    }

    public static function toDto(User $user): UserDTO
    {
        return UserDTO::fromModel($user);
    }

}
