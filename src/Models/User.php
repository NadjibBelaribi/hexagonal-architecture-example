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

  /*  public function checkLogin ()
    {
        $users = $this->pdo->prepare('select * from users where email = :mail ');
        $users->bindParam(':mail', $this->email, PDO::PARAM_STR);
        $users->execute() ;
        if ($users->rowCount() == 1)
        {
           $user = $users->fetch() ;
           if($user['password'] == base64_decode($this->password))
               return $user['id'] ;
        }
        return -1 ;
    }

    public function userExists(string $username): bool {
        $query = 'SELECT 1 FROM users WHERE username = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        $res = $stmt->fetch();

        if (!$res) {
            return false;
        }

        return true;
    }*/
}
