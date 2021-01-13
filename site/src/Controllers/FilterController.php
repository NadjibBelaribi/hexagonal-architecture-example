<?php

namespace Amir_nadjib\Todo_list\Controllers;

use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class FilterController extends HomeController
{

    public function filter(RequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'search.tpl');
    }

    public function filterByUser(RequestInterface $request, ResponseInterface $response)
    {
        $hint =  '%' .  $_GET['user'] . '%' ;
        $tasks = $this->getTasks($hint,"user") ;
        $response->getBody()->write($tasks);
        return $response->withStatus(200);
    }

    public function getTasks(string $hint , string $filter)
    {
        if($filter == "task")
            $tasks = $this->pdo->prepare('select id , title from todos where title like :hint');
        else
            $tasks = $this->pdo->prepare('select title from users inner join todos
                on users.id = todos.created_by where email like :hint');
        $tasks->bindParam(':hint', $hint, PDO::PARAM_STR);
        $tasks->execute();
        $tasks = $tasks->fetchAll();
        return json_encode($tasks);
    }
    public function filterByTask(RequestInterface $request, ResponseInterface $response)
    {
        $hint =  '%' . $_GET['title'] . '%';
        $tasks = $this->getTasks($hint,"task") ;
        $response->getBody()->write($tasks);
        return $response->withStatus(200);
    }
}
