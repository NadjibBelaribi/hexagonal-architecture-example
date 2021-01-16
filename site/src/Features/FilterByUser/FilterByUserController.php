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
        $response->getBody()->write(json_encode($this->service->getTasks($request)));
        return $response->withStatus(200);

    }
}