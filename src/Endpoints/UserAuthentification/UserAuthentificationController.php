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

        try {
            $request = new UserAuthentificationRequest($_POST['email'],$_POST['password']);
            $responseData = $this->service->checkUser($request);
            $_SESSION['userId'] = $responseData->getUserData()['id'] ;
            $destin = 'tasks/'.  $_SESSION['userId'];
            $response->getBody()->write(json_encode($destin)) ;
             return $response->withStatus(200,'User data');

        } catch (UserNotFoundException $exception) {
            return $response->withStatus(400, 'User not Found ');
        } catch (UserErrorIdentification $exception) {
            return $response->withStatus(409, 'User error identification');
        }
    }
}
