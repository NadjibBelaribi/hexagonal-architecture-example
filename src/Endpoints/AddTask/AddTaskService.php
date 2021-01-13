<?php


namespace Amir_nadjib\Todo_list\Endpoints\AddTask;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class AddTaskService
{
    private TodoInterfaceRepository $repository ;

    /**
     * AddTaskService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addTask(AddTaskRequest $request):AddTaskResponse {

        $user = $this->repository->getUserByEmail($request->getAssigned()) ;
        $assignedId = $user['id'] ;
        $dueDate = date_create_from_format('Y-m-d', $request->getDueDate());
         if($dueDate  <=  date("Y-m-d"))
            throw new DueDateException() ;
        else {
            $lastId =  $this->repository->insertTask($request->getUserId(),$assignedId,
                $request->getTitle()  ,$request->getDescription(),$request->getDueDate());
            return new AddTaskResponse($lastId) ;
        }

    }

}