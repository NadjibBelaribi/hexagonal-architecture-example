<?php


namespace Amir_nadjib\Todo_list\Features\TaskDetail;


use Amir_nadjib\Todo_list\Features\TasksHome\NoTasksFoundException;
use Amir_nadjib\Todo_list\Features\TasksHome\NoUsersFoundException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TaskDetailController
{

    private Twig $twig ;
    private TaskDetailService $service;

    /**
     * TaskDetailService constructor.
     * @param Twig $twig
     * @param TaskDetailService $service
     */
    public function __construct(Twig $twig, TaskDetailService $service)
    {
        $this->twig = $twig;
        $this->service = $service;
    }

    public function __invoke (RequestInterface $request, ResponseInterface $response,array $args): ResponseInterface{
        // TODO: try catch

        $request = new TaskDetailRequest($args['id']) ;
        $assigned = $this->service->getAssigned($args['id'] );
        $_SESSION['taskId'] = $args['id'] ;
        return $this->twig->render($response, 'tasks.tpl', [
            'todos' => $this->service->getTasks() ,
            'comments' => $this->service->getComments($request),
            'users' => $this->service->getUsers(),
            'curTask' => $this->service->getTask($request),
            //'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
            'creator' => $this->service->getTask($request)['email'],
            'assigned'=> $assigned['email'],
            'error' => 'Could not render tasks page'
        ]);

    }
}