<?php


namespace Amir_nadjib\Todo_list\Endpoints\ListingAllTasks;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class ListingAllTasksService
{
    private TodoInterfaceRepository $repository ;

    /**
     * ListingAllTasksService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getTasks():array {
        $todos = $this->repository->getAllTasksTitles() ;
         if(empty($todos))
            throw new NoTasksFoundException() ;
        else
            return $todos ;

    }
}