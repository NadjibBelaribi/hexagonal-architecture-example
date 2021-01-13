<?php


namespace Amir_nadjib\Todo_list\Features\TaskDetail;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class TaskDetailService
{
    private TodoInterfaceRepository $repository ;

    /**
     * TaskDetailService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTask(TaskDetailRequest $request): array{

        return $this->repository->getTaskById($request->getTaskId()) ;
    }
    public function getComments(TaskDetailRequest $request): array{

         return  $this->repository->getComments($request->getTaskId()) ;
    }
    public function getUsers(): array{

       return $this->repository->getAllUsers() ;

     }
    public function getTasks(): array{

        return $this->repository->getAllTasks() ;
    }

    public function getAssigned($tid): array{

        return $this->repository->getUserAssigned($tid);
    }

}