<?php


namespace Amir_nadjib\Todo_list\Features\TasksHome;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use Amir_nadjib\Todo_list\Repository\ApiTodoRepository ;
use PHPUnit\Framework\MockObject\Api;

class TasksHomeService
{
    private TodoInterfaceRepository $repository ;
    private ApiTodoRepository $api ;
    /**
     * TasksHomeService constructor.
     * @param TodoInterfaceRepository $repository
     * @param  ApiTodoRepository $api ;

     */
    public function __construct(TodoInterfaceRepository $repository,ApiTodoRepository $api)
    {
        $this->repository = $repository;
        $this->api = $api;

    }

    public function getTasks() {
        //$todos = $this->api->getAllTasks() ;
        $todos = $this->repository->getAllTasks() ;

        if(empty($todos))
            throw new NoTasksFoundException() ;
        else{
            return $todos ;
        }
    }
    public function getUsers() {
        $users= $this->repository->getAllUsers() ;
        if(empty($users))
            throw new NoUsersFoundException() ;
        else
            return $users ;
    }
}