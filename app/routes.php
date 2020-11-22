<?php

use Amir_nadjib\Todo_list\Controllers\HomeController;
use Amir_nadjib\Todo_list\Controllers\LoginController;
use Amir_nadjib\Todo_list\Controllers\TasksController;
use Amir_nadjib\Todo_list\Controllers\FilterController;
use function DI\value;
use \Slim\Routing\RouteParser ;
$container->set(RouteParser::class, value($app->getRouteCollector()->getRouteParser()));

 /* Login page */
$app->get('/', LoginController::class . ':getLogin');
$app->post('/auth', LoginController::class . ':postLogin');
$app->get('/signOut', LoginController::class . ':signOut');


/* Tasks page */
$app->get('/tasks/{id}', TasksController::class . ':getTasks')->setName('tasks');
$app->get('/tasks/{id}/details', TasksController::class . ':getTaskDetails');
$app->post('/tasks/addTask', TasksController::class . ':addTask');
$app->post('/addComment', TasksController::class . ':addComment');

/* Filtering search routes */
$app->get('/filterIdSearch', FilterController::class . ':filterByUser');
$app->get('/filterTaskSearch', FilterController::class . ':filterByTask');


