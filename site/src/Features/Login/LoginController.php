<?php


namespace Amir_nadjib\Todo_list\Features\Login;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class LoginController
{
    private LoginService $service;
    private Twig $twig;

    /**
     * UserAuthentificationController constructor.
     * @param LoginService $service
     * @param Twig $twig
     */
    public function __construct(LoginService $service, Twig $twig)
    {
        $this->service = $service;
        $this->twig = $twig;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface {

        try {
            $request = new LoginRequest($_POST['email'],$_POST['password']);
            $responseData = $this->service->checkUser($request);
            $_SESSION['userId'] = $responseData->getUserData()['id'] ;
            $_SESSION['userEmail'] = $_POST['email'] ;
            $destin = 'tasks/'.  $_SESSION['userId'];
            $response->getBody()->write(json_encode($destin)) ;
            return $response->withStatus(200,'User data');

        } catch (UserNotFoundException $exception) {
            $response->getBody()->write(json_encode('failure')) ;
            return $response->withStatus(400, 'User not Found ');
        } catch (UserErrorIdentificationException $exception) {
            $response->getBody()->write(json_encode('failure')) ;
            return $response->withStatus(409, 'User error identification');
        }
    }
}
