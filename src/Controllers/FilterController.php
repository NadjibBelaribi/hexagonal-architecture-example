<?php

namespace Hakan\Hello\Controllers;

use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class FilterController
{
    private PDO $pdo;
    private Twig $twig;

    public function __construct(PDO $pdo, Twig $twig)
    {
        $this->pdo = $pdo;
        $this->twig = $twig;

    }

    public function filter(RequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'search.tpl');

    }

    public function filterByUser(RequestInterface $request, ResponseInterface $response)
    {

         $usr = $_GET['user'] . '%';
         $tasks = $this->pdo->prepare('select title from users inner join todos
                on users.id = todos.created_by where email like :hint');
        $tasks->bindParam(':hint', $usr, PDO::PARAM_STR);

        $tasks->execute();
        $tasks = $tasks->fetchAll();
        $payload = json_encode($tasks);

        $response->getBody()->write($payload);
        return $response->withStatus(200);
    }

    public function filterByTask(RequestInterface $request, ResponseInterface $response)
    {

        $tsk = $_GET['title'] . '%';
        $tasks = $this->pdo->prepare('select id , title from todos where title like :hint');
        $tasks->bindParam(':hint', $tsk, PDO::PARAM_STR);

        $tasks->execute();
        $tasks = $tasks->fetchAll();
        $payload = json_encode($tasks);

        $response->getBody()->write($payload);
        return $response->withStatus(200);
    }
}
