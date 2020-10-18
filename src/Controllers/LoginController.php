<?php

namespace Hakan\Hello\Controllers;

use Hakan\Hello\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class LoginController
{
    private PDO $pdo;
    private Twig $twig;

    public function __construct(PDO $pdo, Twig $twig)
    {
        $this->pdo = $pdo;
        $this->twig = $twig;

    }

    public function getLogin (RequestInterface $request, ResponseInterface $response) {

        return $this->twig->render($response, 'login.tpl');
    }
    public function postLogin (RequestInterface $request, ResponseInterface $response) {

        $params = $request->getParsedBody();
        $authEmail = $params['email'] ;
        $authPassword = $params['password'] ;

         $users = $this->pdo->prepare('select * from users where email = :mail ');
         $users->bindParam(':mail', $authEmail, PDO::PARAM_STR);
         $users->execute() ;
         if($users->rowCount() != 1)
         {
             // handle error later
             echo "email do not exist" ;
         }

        $user = $users->fetch();
         if($user['password']== $authPassword)
         {
         echo "Authentication success \n" ;
         // redirect to tasks page
             return $response->withHeader('Location','/tasks/1') ;
         }
         echo "email or password wrong \n" ;

    }
}
