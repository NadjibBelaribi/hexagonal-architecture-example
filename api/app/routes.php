<?php

use Amir_nadjib\Todo_list\Endpoints\AddComment\AddCommentController;
use Amir_nadjib\Todo_list\Endpoints\AddTask\AddTaskController;
use Amir_nadjib\Todo_list\Endpoints\ListingAllTasks\ListingAllTasksController;
use Amir_nadjib\Todo_list\Endpoints\ListingComments\ListingCommentsController;
use Amir_nadjib\Todo_list\Endpoints\TaskDetails\TaskDetailsController;
use Amir_nadjib\Todo_list\Endpoints\UserAuthentification\UserAuthentificationController;


/****************** API TESTS ************/


$app->get('/', function (){

    echo "welcome" ;
});

//- authentication utilisateur
$app->post('/auth', UserAuthentificationController::class. ':login');

//- listing des tâches
$app->get('/getTasks', ListingAllTasksController::class);

//- détail d’une tâche
$app->get('/taskDetails/{taskId}', TaskDetailsController::class);

//- listing des commentaires
$app->get('/listComments/{taskId}', ListingCommentsController::class);

//- ajout d’une tâche
$app->post('/addTask/{userId}', AddTaskController::class);

//- ajout d’un commentaire
$app->post('/addComment/{userId}/{taskId}', AddCommentController::class);
