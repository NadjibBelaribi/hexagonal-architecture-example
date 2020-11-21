<?php

namespace Amir_nadjib\Todo_list\Controllers;

use Amir_nadjib\Todo_list\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TasksController extends HomeController
{


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
    public function getTaskDetails (RequestInterface $request, ResponseInterface $response, array $args){
        $taskId = $args['id'] ;
        $_SESSION['curTaskId'] = $taskId ;
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
        $comments = $this->pdo->prepare('select comment , email , created_at from comments inner join users  on users.id = comments.created_by  where task_id = :tid ');
        $comments->bindParam(':tid', $taskId, PDO::PARAM_INT);
        $comments->execute() ;
        $comments = $comments->fetchAll() ;

         return $this->twig->render($response, 'tasks.tpl', [
             'todos' => $todos,
             'users' => $users,
             'comments' => $comments,
             'curTask' => $task,
             'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
             'creator' => $creator['email'],
             'assigned'=> $assigned['email'],
             'error' => 'Could not connect to database'
        ]);
    }
    public function addTask(RequestInterface $request, ResponseInterface $response){
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

        if($execute->execute()) {
            $data= $this->pdo->query('SELECT * FROM todos ORDER BY id DESC LIMIT 1 ');
            $task = $data->fetch() ;
            $res = json_encode($task) ;
            $response->getBody()->write($res) ;
            return $response->withStatus(200);
        }
    }
    public function addComment(RequestInterface $request, ResponseInterface $response){
         $comment = $_POST['comment'];
         $taskId =  $_SESSION['curTaskId'] ;
         $created_by =  $_SESSION['userId'] ;

        $currDate = date("Y-m-d H:i:s");
        $sql = "insert into comments (id, task_id, created_by, created_at, comment) VALUES (null,'$taskId','$created_by','$currDate','$comment')" ;
         $execute = $this->pdo->prepare($sql);

         if($execute->execute()){
            $comm = $comment;
            $res = json_encode($comm) ;
            $response->getBody()->write($res) ;
            return $response->withStatus(200);
        }
    }
}
