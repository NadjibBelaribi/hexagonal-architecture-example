<?php


namespace Amir_nadjib\Todo_list\Features\FilterByTask;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use http\Env\Request;

class FilterByTaskService
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

    public function getUsers(): array{

        return $this->repository->getAllUsers() ;

    }
    public function getTasks(FilterByTaskRequest $request): array{

        $hint = '%'. $request->getHint() .'%' ;
        return $this->repository->filterByTask($hint) ;
    }

    public function getAssigned($tid): array{

        return $this->repository->getUserAssigned($tid);
    }

}