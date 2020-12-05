<?php


namespace Amir_nadjib\Todo_list\Features\UserAuthentification;



use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class UserAuthentificationController
{
    private UserAuthentificationService $service;

    public function __construct(UserAuthentificationService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface {

        try {
            $request = new UserAuthentificationRequest($_POST['email'],$_POST['password']);
            $responseData = $this->service->checkUser($request);

            $response->getBody()->write(json_encode($responseData->getUserData())) ;
             return $response->withStatus(200,'User data');

        } catch (UserNotFoundException $exception) {
            return $response->withStatus(400, 'User not Found ');
        } catch (UserErrorIdentification $exception) {
            return $response->withStatus(409, 'User error identification');
        }
    }
}
