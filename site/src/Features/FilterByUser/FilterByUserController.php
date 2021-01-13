<?php


namespace Amir_nadjib\Todo_list\Features\FilterByUser;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class FilterByUserController
{

    private Twig $twig ;
    private FilterByUserService $service;

    /**
     * TaskDetailService constructor.
     * @param Twig $twig
     * @param FilterByUserService $service
     */
    public function __construct(Twig $twig, FilterByUserService $service)
    {
        $this->twig = $twig;
        $this->service = $service;
    }

    public function __invoke (RequestInterface $request, ResponseInterface $response,array $args): ResponseInterface{
        // TODO: try catch

        $request = new FilterByUserRequest($_GET['user']) ;
        var_dump($this->service->getTasks($request));
        return $this->twig->render($response, 'tasks.tpl', [
            'todos' => $this->service->getTasks($request) ,
            'users' => $this->service->getUsers(),
            //'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
            'error' => 'Could not render tasks page'
        ]);

    }
}