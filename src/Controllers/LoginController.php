<?php

namespace Amir_nadjib\Todo_list\Controllers;

use Amir_nadjib\Todo_list\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Slim\Psr7\Response;
use Slim\Views\Twig;
use DI\value ;
class LoginController extends HomeController
{
    public function getLogin (RequestInterface $request, ResponseInterface $response) {

        return $this->twig->render($response, 'login.tpl');
    }

    public function getUserByEmail (string $authEmail)
    {
        $users = $this->pdo->prepare('select * from users where email = :mail ');
        $users->bindParam(':mail', $authEmail, PDO::PARAM_STR);
        $users->execute() ;
        if ($users->rowCount() == 1)
        {
            return $users->fetch() ;
        }
        return null ;
    }
    public function postLogin (RequestInterface $request, ResponseInterface $response) {

         $authEmail = $_POST['email'] ;
         $authPassword = $_POST['password'] ;

            $user = $this->getUserByEmail($authEmail) ;
            if($user['password'] == $authPassword)
            {
                $_SESSION['user'] =$authEmail ;
                $_SESSION['userId'] =$user['id'] ;
                $response->getBody()->write(json_encode($user['id'])) ;
                 return $response->withStatus(200);
               // $res = $response->withHeader('Location', 'https://www.google.com/');
                return $response->withStatus(200);
                //return $res ;

            }
            else {
                $res = json_encode("no") ;
                $response->getBody()->write($res) ;
                return $response->withStatus(200);
            }

    }

    public function signOut (RequestInterface $request, ResponseInterface $response) {
        session_reset();
        return $response->withStatus(200);

    }
}
