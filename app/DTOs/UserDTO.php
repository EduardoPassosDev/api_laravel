<?php

namespace App\DTOs;

use App\Models\User;

class UserDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public ?string $password = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? 0,
            name: $data['name'],
            email: $data['email'],
            password: $data['password'] ?? null
        );
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
            email: $user->email
        );
    }

    public function hashPassword(): void
    {
        if ($this->password !== null) {
            $this->password = bcrypt($this->password);
        }
    }

}
