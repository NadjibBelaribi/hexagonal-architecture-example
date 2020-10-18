<?php

namespace Hakan\Hello\Controllers;

use Hakan\Hello\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TasksController
{
    private PDO $pdo;
    private Twig $twig;

    public function __construct(PDO $pdo, Twig $twig)
    {
        $this->pdo = $pdo;
        $this->twig = $twig;
    }

    public function getTasks (RequestInterface $request, ResponseInterface $response, array $args) {
        $taskId = $args['id'] ;
        $todos = $this->pdo->prepare('select * from todos where created_by = :id ');
        $todos->bindParam(':id', $taskId, PDO::PARAM_INT);
        $todos->execute() ;
        $todos = $todos->fetchAll() ;
        $users = $this->pdo->query('select * from users')->fetchAll();

        return $this->twig->render($response, 'tasks.tpl',[
            'todos' => $todos,
            'users' => $users,
            'curTask' => $todos[0],
            'error' => 'Could not connect to database'
        ]);
    }
    public function getTaskDetails (RequestInterface $request, ResponseInterface $response, array $args)
    {
        $taskId = $args['id'] ;

        $task = $this->pdo->prepare('select * from todos where id = :tid ');
        $task->bindParam(':tid', $taskId, PDO::PARAM_INT);
        $task->execute() ;
        $task = $task->fetch() ;

        $todos = $this->pdo->query('select * from todos where created_by = 1 ')->fetchAll();

        $users = $this->pdo->query('select * from users')->fetchAll();

        $comments = $this->pdo->prepare('select * from comments where task_id = :tid ');
        $comments->bindParam(':tid', $taskId, PDO::PARAM_INT);
        $comments->execute() ;
        $comments = $comments->fetchAll() ;

         return $this->twig->render($response, 'tasks.tpl', [
             'todos' => $todos,
             'users' => $users,
             'comments' => $comments,
             'curTask' => $task,
            'error' => 'Could not connect to database'
        ]);
    }
    public function postTasks (RequestInterface $request, ResponseInterface $response) {

        echo "into tasks" ;
      /*  $params = $request->getParsedBody();
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
            echo "Authentication success \n" ;


        $todos = $this->pdo->query('select * from todos ')->fetchAll();

        return $this->twig->render($response, 'tasks.tpl', [
            'todos' => $todos,
            'error' => 'Could not connect to database'
        ]);*/
    }
}
