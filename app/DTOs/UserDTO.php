<?php

namespace App\DTOs;

class UserDTO
{

    public string $name;
    public string $email;
    public ?string $password;


    public function __construct(array $data )
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'] ?? null;
    }

    public function hashPassword():void
    {
        if($this->password){
            $this->password = bcrypt($this->password);
        }
    }

}
