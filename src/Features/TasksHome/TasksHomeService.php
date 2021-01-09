<?php


namespace Amir_nadjib\Todo_list\Features\TasksHome;


use Amir_nadjib\Todo_list\Features\Login\LoginResponse;
use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class TasksHomeService
{
    private TodoInterfaceRepository $repository ;

    /**
     * TasksHomeService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTasks():TasksHomeResponse {
        $todos = $this->repository->getAllTasks() ;
        if(empty($todos))
            throw new NoTasksFoundException() ;
        else
            return new TasksHomeResponse($todos,$todos,1) ;
    }
    public function getUsers():TasksHomeResponse {
        $users= $this->repository->getAllUsers() ;
        if(empty($users))
            throw new NoUsersFoundException() ;
        else
            return new TasksHomeResponse($users,$users,0) ;
    }
}