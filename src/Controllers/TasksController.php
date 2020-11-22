<?php

namespace Amir_nadjib\Todo_list\Controllers;

use Amir_nadjib\Todo_list\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TasksController extends HomeController
{

    public function getAllUsers ()
    {
        return  $this->pdo->query('select * from users ')->fetchAll();
        $comments = $this->pdo->prepare('select * from comments where task_id = 1 ');
        $comments->execute() ;
        $comments = $comments->fetchAll() ;

    }
    public function getComments ($taskId)
    {

        $comments = $this->pdo->prepare('select comment , email , created_at from comments inner join users  on users.id = comments.created_by  where task_id = :tid ');
        $comments->bindParam(':tid', $taskId, PDO::PARAM_INT);
        $comments->execute() ;
        return $comments->fetchAll() ;

    }
    public function getAllTasks ()
    {
        return  $this->pdo->query('select * from todos ')->fetchAll();
    }
    public function getTasks (RequestInterface $request, ResponseInterface $response, array $args) {

        return $this->twig->render($response, 'tasks.tpl',[
            'todos' => $this->getAllTasks() ,
            'users' => $this->getAllUsers() ,
            'comments'=> $this->getComments(1),
            'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
            'curTask' => $this->getAllTasks()[0],
            'error' => 'Could not render tasks page'
        ]);
    }
    public function getTaskById ($tid)
    {
        $id = intval($tid) ;
        $task = $this->pdo->prepare('select * from todos inner join users
		on users.id = todos.created_by where todos.id = :tid');
        $task->bindParam(':tid', $id, PDO::PARAM_INT);
        $task->execute() ;
        return  $task->fetch() ;
    }
    public function getUserById (int $uid)
    {
        $val = intval($uid) ;
        $users = $this->pdo->prepare('select * from users where id = :uid ');
        $users->bindParam(':uid', $val, PDO::PARAM_INT);
        $users->execute() ;
        return $users->fetch() ;
    }
    public function getTaskDetails (RequestInterface $request, ResponseInterface $response, array $args){
        $taskId = $args['id'] ;
        $_SESSION['curTaskId'] = $taskId ;

        $task = $this->getTaskById($taskId) ;

        $creator = $this->getUserById($task['created_by']) ;
        $assigned = $this->getUserById($task['assigned_to']) ;

        $todos = $this->getAllTasks();
        $users = $this->getAllUsers() ;

        $comments = $this->getComments($taskId) ;

        return $this->twig->render($response, 'tasks.tpl', [
            'todos' => $todos,
            'users' => $users,
            'comments' => $comments,
            'curTask' => $task,
            'currentUser'=>ucfirst(strtok($_SESSION['user'],'@')),
            'creator' => $creator['email'],
            'assigned'=> $assigned['email'],
            'error' => 'Could not render tasks page'
        ]);
    }

    public function insertTask($currUser,$userId,$title,$description,$dueDate)
    {
        $currDate = date("Y-m-d H:i:s");
        $this->pdo->query("INSERT INTO todos (id, created_by, assigned_to, title, description, created_at, due_date)
		VALUES(null,'$currUser','$userId','$title','$description','$currDate','$dueDate');") ;

        return $this->pdo->query('SELECT * FROM todos ORDER BY id DESC LIMIT 1 ');

    }
        public function addTask(RequestInterface $request, ResponseInterface $response){
        $title = $_POST['title'];
        $assigned = $_POST['assigned'];
        $description = $_POST['description'];
        $dueDate = $_POST['dueDate'];
        $currUser = $_SESSION['userId'] ;

        $user  = $this->getUserByEmail($assigned) ;
        $userId = $user['id'] ;

        $task = $this->insertTask($currUser,$userId,$title,$description,$dueDate) ;
        $response->getBody()->write( json_encode($task)) ;
        return $response->withStatus(200);


    }
    public function addComment(RequestInterface $request, ResponseInterface $response){
        $comment = $_POST['comment'];
        $taskId =  $_SESSION['curTaskId'] ;
        $created_by =  $_SESSION['userId'] ;
        $currDate = date("Y-m-d H:i:s");
        $this->pdo->query("insert into comments (id, task_id, created_by, created_at, comment) VALUES 
                (null,'$taskId','$created_by','$currDate','$comment')") ;

        $response->getBody()->write(json_encode($comment)) ;
        return $response->withStatus(200);
        }

}
