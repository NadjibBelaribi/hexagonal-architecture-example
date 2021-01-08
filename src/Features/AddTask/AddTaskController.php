<?php


namespace Amir_nadjib\Todo_list\Features\AddTask;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddTaskController
{
    private AddTaskService $service ;

    /**
     * AddTaskController constructor.
     * @param AddTaskService $service
     */
    public function __construct(AddTaskService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response,array $args):ResponseInterface
    {

        try {
            $title = $_POST['title'];
            $assigned = $_POST['assigned'];
            $description = $_POST['description'];
            $dueDate = $_POST['dueDate'];
            $currUser = $args['userId'] ;
            $request = new AddTaskRequest($title,$assigned,$description,$dueDate,$currUser) ;
            $responseData = $this->service->addTask($request) ;
            $data = array($responseData->getId(),$title );
            $response->getBody()->write(json_encode($data)) ;
            return $response->withStatus(200,'Task added !');
        }
        catch (DueDateException $exception){
            return $response->withStatus(409,'Due Date must be in future ');
        }
    }


}