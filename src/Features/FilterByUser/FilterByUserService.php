<?php


namespace Amir_nadjib\Todo_list\Features\FilterByUser;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use http\Env\Request;

class FilterByUserService
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
    public function getTasks(FilterByUserRequest $request): array{

        $hint = '%'. $request->getHint() .'%' ;
        return $this->repository->filterByUser($hint) ;
    }

    public function getAssigned($tid): array{

        return $this->repository->getUserAssigned($tid);
    }

}