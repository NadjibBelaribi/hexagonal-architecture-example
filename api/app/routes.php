<?php

use Amir_nadjib\Todo_list\Endpoints\AddComment\AddCommentController;
use Amir_nadjib\Todo_list\Endpoints\AddTask\AddTaskController;
use Amir_nadjib\Todo_list\Endpoints\ListingAllTasks\ListingAllTasksController;
use Amir_nadjib\Todo_list\Endpoints\ListingComments\ListingCommentsController;
use Amir_nadjib\Todo_list\Endpoints\TaskDetails\TaskDetailsController;
use Amir_nadjib\Todo_list\Endpoints\UserAuthentification\UserAuthentificationController;
/*
// Login page
//$app->post('/auth', LoginController::class. ':postLogin');
$app->get('/signOut', LoginController::class . ':signOut');

// about us
$app->get('/about', HomeController::class . ':aboutUS');

// Tasks page
$app->get('/tasks/{id}', TasksController::class . ':getTasks') ;
$app->get('/tasks/{id}/details', TasksController::class . ':getTaskDetails');
//$app->post('/tasks/addTask', TasksController::class . ':addTask');
//$app->post('/addComment', TasksController::class . ':addComment');

//Filtering search routes
$app->get('/filterIdSearch', FilterController::class . ':filterByUser');
$app->get('/filterTaskSearch', FilterController::class . ':filterByTask');
*/

/****************** API TESTS ************/

$app->get('/', UserAuthentificationController::class);

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
