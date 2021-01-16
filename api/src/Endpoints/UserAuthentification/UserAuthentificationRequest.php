<?php


namespace Amir_nadjib\Todo_list\Endpoints\UserAuthentification;


class UserAuthentificationRequest
{
    private string $email ;
    private  string $pwd ;

    /**
     * UserAuthentificationRequest constructor.
     * @param string $email
     * @param string $pwd
     */
    public function __construct(string $email, string $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

}