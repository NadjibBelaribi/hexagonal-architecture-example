<?php


namespace Amir_nadjib\Todo_list\Endpoints\UserAuthentification;



use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class UserAuthentificationController
{
    private UserAuthentificationService $service;
    private Twig $twig;

    /**
     * UserAuthentificationController constructor.
     * @param UserAuthentificationService $service
     * @param Twig $twig
     */
    public function __construct(UserAuthentificationService $service, Twig $twig)
    {
        $this->service = $service;
        $this->twig = $twig;
    }


    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface{

            return $this->twig->render($response, 'login.tpl');
    }
        public function login(RequestInterface $request, ResponseInterface $response): ResponseInterface {

        echo " we are here boy" ;
    }
}
