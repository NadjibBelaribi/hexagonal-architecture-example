<?php


namespace Amir_nadjib\Todo_list\Features\TaskDetails;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class TaskDetailsController
{
    private TaskDetailsService $service ;

    /**
     * TaskDetailsController constructor.
     * @param TaskDetailsService $service
     */
    public function __construct(TaskDetailsService $service)
    {
        $this->service = $service;
    }
    public function __invoke(RequestInterface $request, ResponseInterface $response,array $args):ResponseInterface
    {
        $task = $this->service->getTaskDetails($args['taskId']) ;
        var_dump($task->getAssignedTo());
        return $response->withStatus(200, sprintf('Task Details'));

    }

}