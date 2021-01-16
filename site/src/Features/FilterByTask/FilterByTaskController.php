<?php


namespace Amir_nadjib\Todo_list\Features\FilterByTask;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class FilterByTaskController
{

    private Twig $twig ;
    private FilterByTaskService $service;

    /**
     * TaskDetailService constructor.
     * @param Twig $twig
     * @param FilterByTaskService $service
     */
    public function __construct(Twig $twig, FilterByTaskService $service)
    {
        $this->twig = $twig;
        $this->service = $service;
    }

    public function __invoke (RequestInterface $request, ResponseInterface $response,array $args): ResponseInterface{
        // TODO: try catch

        $request = new FilterByTaskRequest($_GET['title']) ;
         $response->getBody()->write(json_encode($this->service->getTasks($request)));
        return $response->withStatus(200);

    }
}