<?php

use Amir_nadjib\Todo_list\Controllers\HomeController;
use Amir_nadjib\Todo_list\Controllers\LoginController;
use Amir_nadjib\Todo_list\Controllers\TasksController;
use Amir_nadjib\Todo_list\Controllers\FilterController;
use Amir_nadjib\Todo_list\Features\AddComment\AddCommentController;
use Amir_nadjib\Todo_list\Features\AddTask\AddTaskController;
use Amir_nadjib\Todo_list\Features\ListingAllTasks\ListingAllTasksController;
use Amir_nadjib\Todo_list\Features\ListingComments\ListingCommentsController;
use Amir_nadjib\Todo_list\Features\TaskDetails\TaskDetailsController;
use Amir_nadjib\Todo_list\Features\UserAuthentification\UserAuthentificationController;

/* Login page */
$app->get('/', LoginController::class . ':getLogin');
//$app->post('/auth', LoginController::class. ':postLogin');
$app->get('/signOut', LoginController::class . ':signOut');

/* about us */
$app->get('/about', HomeController::class . ':aboutUS');

/* Tasks page */
$app->get('/tasks/{id}', TasksController::class . ':getTasks') ;
$app->get('/tasks/{id}/details', TasksController::class . ':getTaskDetails');
//$app->post('/tasks/addTask', TasksController::class . ':addTask');
//$app->post('/addComment', TasksController::class . ':addComment');

/* Filtering search routes */
$app->get('/filterIdSearch', FilterController::class . ':filterByUser');
$app->get('/filterTaskSearch', FilterController::class . ':filterByTask');


/****************** API TESTS ************/
//-Endpoint d’authentification utilisateur
$app->post('/auth', UserAuthentificationController::class);

//-Endpoint de listing des tâches
$app->get('/getTasks', ListingAllTasksController::class);

//-Endpoint de détail d’une tâche
$app->get('/taskDetails/{taskId}', TaskDetailsController::class);

//-Endpoint de listing des commentaires
$app->get('/listComments/{taskId}', ListingCommentsController::class);

//-Endpoint d’ajout d’une tâche
$app->post('/addTask/{userId}', AddTaskController::class);

//-Endpoint d’ajout d’un commentaire
$app->post('/addComment/{userId}/{taskId}', AddCommentController::class);
