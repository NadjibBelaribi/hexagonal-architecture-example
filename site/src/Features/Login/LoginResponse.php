<?php


namespace Amir_nadjib\Todo_list\Features\Login;

class LoginResponse
{
    private array $userData ;

    /**
     * UserAuthentificationResponse constructor.
     * @param string $userDate
     */
    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }

    /**
     * @return string
     */
    public function getUserData(): array
    {
        return $this->userData;
    }




}
