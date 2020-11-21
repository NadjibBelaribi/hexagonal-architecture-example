<?php

namespace Amir_nadjib\Todo_list\Models;

class User
{
    private $email;
    private $password;

    public function __construct(string $email ,string $pswd)
    {
        $this->email = $email;
        $this->password = $pswd;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
}
