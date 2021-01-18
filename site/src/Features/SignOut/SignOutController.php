<?php


namespace Amir_nadjib\Todo_list\Features\SignOut;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class SignOutController
{

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface {

        $_SESSION['userEmail'] = "" ;
        $_SESSION['userId'] = "" ;

        $response->getBody()->write(json_encode($_SESSION['userEmail'])) ;
        return $response->withStatus(200);

    }
}
