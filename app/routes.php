<?php

use Amir_nadjib\Todo_list\Features\Home\HomeController;
use Amir_nadjib\Todo_list\Features\Login\LoginController;
use Amir_nadjib\Todo_list\Features\TasksHome\TasksHomeController;
use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailController;
use Amir_nadjib\Todo_list\Features\AddTask\AddTaskController;

use Amir_nadjib\Todo_list\Features\AddComment\AddCommentController;
use Amir_nadjib\Todo_list\Controllers\FilterController;

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
$app->get('/filterIdSearch', FilterController::class . ':filterByUser');
$app->get('/filterTaskSearch', FilterController::class . ':filterByTask');


