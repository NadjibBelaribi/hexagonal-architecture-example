<?php

namespace Amir_nadjib\Todo_list\Models;

class User
{
    private $id ;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
