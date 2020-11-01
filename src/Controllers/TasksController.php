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
        $userId = $args['id'] ;
        $todos = $this->pdo->prepare('select * from todos ');
        $todos->execute() ;
        $todos = $todos->fetchAll() ;
        $users = $this->pdo->query('select * from users')->fetchAll();

        $comments = $this->pdo->prepare('select * from comments where task_id = 1 ');
        $comments->execute() ;
        $comments = $comments->fetchAll() ;

        return $this->twig->render($response, 'tasks.tpl',[
            'todos' => $todos,
            'users' => $users,
            'comments'=> $comments,
            'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
            'curTask' => $todos[0],
            'error' => 'Could not connect to database'
        ]);
    }
    public function getTaskDetails (RequestInterface $request, ResponseInterface $response, array $args)
    {
        $taskId = $args['id'] ;

        $task = $this->pdo->prepare('select * from todos inner join users
        on users.id = todos.created_by where todos.id = :tid');
        $task->bindParam(':tid', $taskId, PDO::PARAM_INT);
        $task->execute() ;
        $task = $task->fetch() ;

        $users = $this->pdo->prepare('select * from users where users.id = :uid ');
        $users->bindParam(':uid', $task['created_by'], PDO::PARAM_INT);
        $users->execute() ;
        $creator = $users->fetch() ;

        $users = $this->pdo->prepare('select * from users where id = :uid ');
        $users->bindParam(':uid', $task['assigned_to'], PDO::PARAM_INT);
        $users->execute() ;
        $assigned = $users->fetch() ;


        $todos = $this->pdo->query('select * from todos ')->fetchAll();
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
            'creator' => $creator['email'],
            'assigned'=> $assigned['email'],
            'error' => 'Could not connect to database'
        ]);
    }
    public function addTask(RequestInterface $request, ResponseInterface $response)
    {
        $title = $_POST['title'];
        $assigned = $_POST['assigned'];
        $description = $_POST['description'];
        $dueDate = $_POST['dueDate'];
        $currDate = date("Y-m-d H:i:s");
        $currUser = $_SESSION['userId'] ;

        $users = $this->pdo->prepare('select * from users where email = :mail ');
        $users->bindParam(':mail', $assigned, PDO::PARAM_STR);
        $users->execute() ;
        $user = $users->fetch() ;
        $userId = $user['id'] ;

        $sql = "INSERT INTO todos (id, created_by, assigned_to, title, description, created_at, due_date)
VALUES(null,'$currUser','$userId','$title','$description','$currDate','$dueDate');" ;
        $execute = $this->pdo->prepare($sql);

        if($execute->execute())
        {
            $res = json_encode($title) ;
            $response->getBody()->write($res) ;
            return $response->withStatus(200);
        }
    }
    public function addComment(RequestInterface $request, ResponseInterface $response)
    {

         $comment = $_POST['comment'];
         $sql = "insert into comments (id, task_id, created_by, created_at, comment) VALUES (null,2,1,'2019-08-11 16:33:15','$comment')" ;
         $execute = $this->pdo->prepare($sql);

        if($execute->execute())
        {
            $comm = $comment;
            $res = json_encode($comm) ;
            $response->getBody()->write($res) ;
            return $response->withStatus(200);

        }
    }
}
