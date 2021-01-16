<?php


namespace Amir_nadjib\Todo_list\Endpoints\TaskDetails;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class TaskDetailsService
{
    private TodoInterfaceRepository $repository ;

    /**
     * TaskDetailsService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTaskDetails(int $taskId): TaskDetailsResponse{
       $task =  $this->repository->getTaskById($taskId) ;
       $assigned = $this->repository->getUserById($task['assigned_to']) ;
       $creator = $this->repository->getUserById($task['created_by']) ;

       return new TaskDetailsResponse($task['id'],$creator['email'],$assigned['email'],$task['title'],
           $task['description'],$task['created_at'],$task['due_date']) ;
    }
}