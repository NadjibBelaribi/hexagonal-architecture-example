<?php


namespace Amir_nadjib\Todo_list\Features\TasksHome;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TasksHomeController
{
    private Twig $twig ;
    private TasksHomeService $service ;

    /**
     * TasksHomeController constructor.
     * @param Twig $twig
     * @param TasksHomeService $service
     */
    public function __construct(Twig $twig, TasksHomeService $service)
    {
        $this->twig = $twig;
        $this->service = $service;
    }


    public function __invoke (RequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        if($_SESSION['userEmail'] == "")
        {
            var_dump("we need to redirect him vers 404");
        }
        try {

            $todos = ($this->service->getTasks());
            $users = ($this->service->getUsers());
             return $this->twig->render($response, 'tasks.tpl', [
                'todos' => $todos,
                'users' => $users,
                'currentUser'=>ucfirst(strtok($_SESSION['userEmail'],'@')),
                'error' => 'Could not render tasks page'
            ]);
        } catch (NoUsersFoundException $exception) {

        } catch (NoTasksFoundException $exception) {

        }

    }
}