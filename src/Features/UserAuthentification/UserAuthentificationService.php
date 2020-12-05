<?php

namespace Amir_nadjib\Todo_list\Features\UserAuthentification;

use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class UserAuthentificationService
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
    public function checkUser(UserAuthentificationRequest $request):UserAuthentificationResponse {
         $data = $this->repository->getUserByEmail($request->getEmail()) ;

         if (empty($data))
             throw new UserNotFoundException() ;
         if($data['password'] != $request->getPwd())
             throw new UserErrorIdentification() ;

         return new UserAuthentificationResponse($data) ;
    }

}