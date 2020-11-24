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


    public function userExists(string $username): bool {
        $query = 'SELECT id FROM users WHERE email = ?';
        $res = $this->db->prepare($query);
        $res->execute([$username]);
        $data = $res->fetch();

        if (!$data) {
            return false;
        }

        return true;
    }
}
