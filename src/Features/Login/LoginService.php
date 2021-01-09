<?php


namespace Amir_nadjib\Todo_list\Features\Login;
use  Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;


class LoginService
{
    private TodoInterfaceRepository $repository ;

    /**
     * UserAuthentificationService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }
    public function checkUser(LoginRequest $request):LoginResponse {
        $data = $this->repository->getUserByEmail($request->getEmail()) ;

        if (empty($data))
            throw new UserNotFoundException() ;
        if($data['password'] != $request->getPwd())
            throw new UserErrorIdentificationException() ;

        return new LoginResponse($data) ;
    }

}
