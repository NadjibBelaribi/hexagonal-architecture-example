<?php

namespace Amir_nadjib\Todo_list\Controllers;

use Amir_nadjib\Todo_list\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;


class HomeController
{
    protected PDO $pdo;
    protected Twig $twig;

    /**
     * HomeController constructor.
     * @param PDO $pdo
     * @param Twig $twig
      */
    public function __construct(PDO $pdo, Twig $twig)
    {
        $this->pdo = $pdo;
        $this->twig = $twig;
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

    public function aboutUs (RequestInterface $request, ResponseInterface $response) {

        return $this->twig->render($response, 'aboutus.tpl');
    }
}
