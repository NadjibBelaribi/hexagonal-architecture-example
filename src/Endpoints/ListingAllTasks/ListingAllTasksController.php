<?php


namespace Amir_nadjib\Todo_list\Endpoints\ListingAllTasks;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ListingAllTasksController
{
    private ListingAllTasksService $service ;

    /**
     * ListingAllTasksController constructor.
     * @param ListingAllTasksService $service
     */
    public function __construct(ListingAllTasksService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface {
        // TODO: Implement __invoke() method.

        try {
            $tasksTitles = $this->service->getTasks() ;
            var_dump($tasksTitles);
             return $response->withStatus(200, sprintf('all tasks titles %s',json_encode($tasksTitles)));
        }
        catch (NoTasksFoundException $exception) {
            return $response->withStatus(409,'no tasks found') ;
        }
    }


}