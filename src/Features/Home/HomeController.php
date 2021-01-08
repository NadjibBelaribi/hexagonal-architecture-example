<?php


namespace Amir_nadjib\Todo_list\Features\Home;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class HomeController
{
    private Twig $twig ;

    /**
     * HomeController constructor.
     * @param Twig $twig
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }
    public function __invoke (RequestInterface $request, ResponseInterface $response):ResponseInterface {

        return $this->twig->render($response, 'login.tpl');
    }
}