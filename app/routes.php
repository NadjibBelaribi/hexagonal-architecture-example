<?php

<<<<<<< HEAD
use Amir_nadjib\Todo_list\Features\Home\HomeController;
use Amir_nadjib\Todo_list\Features\Login\LoginController;
use Amir_nadjib\Todo_list\Features\TasksHome\TasksHomeController;
use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailController;
use Amir_nadjib\Todo_list\Features\AddTask\AddTaskController;
use Amir_nadjib\Todo_list\Features\FilterByTask\FilterByTaskController;
use Amir_nadjib\Todo_list\Features\AddComment\AddCommentController;
use Amir_nadjib\Todo_list\Features\FilterByUser\FilterByUserController;

 /* Login page */
$app->get('/', HomeController::class);
$app->post('/auth', LoginController::class);
$app->get('/signOut', LoginController::class . ':signOut');

/* about us */
$app->get('/about', HomeController::class . ':about');

/* Tasks page */
$app->get('/tasks/{id}', TasksHomeController::class) ; // user id
$app->get('/tasks/{id}/details', TaskDetailController::class); // task id
$app->post('/tasks/addTask', AddTaskController::class);
$app->post('/addComment', AddCommentController::class);

/* Filtering search routes */
$app->get('/filterIdSearch', FilterByUserController::class);
$app->get('/filterTaskSearch', FilterByTaskController::class );
=======
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
>>>>>>> c7db92740e576144a775507b3c3d87a8f5150f1f

//- ajout d’une tâche
$app->post('/addTask/{userId}', AddTaskController::class);

//- ajout d’un commentaire
$app->post('/addComment/{userId}/{taskId}', AddCommentController::class);
