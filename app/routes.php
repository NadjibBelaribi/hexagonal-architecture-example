<?php

use Hakan\Hello\Controllers\HomeController;
use Hakan\Hello\Controllers\LoginController;
use Hakan\Hello\Controllers\TasksController;
use Hakan\Hello\Controllers\FilterController;

/* Home page */
$app->get('/', HomeController::class . ':get');

/* Login page */
$app->get('/auth', LoginController::class . ':getLogin');
$app->post('/auth', LoginController::class . ':postLogin');

/* Tasks page */
$app->get('/tasks/{id}', TasksController::class . ':getTasks');
$app->get('/tasks/{id}/details', TasksController::class . ':getTaskDetails');
$app->post('/tasks/addTask', TasksController::class . ':addTask');
$app->post('/addComment', TasksController::class . ':addComment');

/* Filtering search routes */
$app->get('/filter', FilterController::class . ':filter');
$app->get('/filterIdSearch', FilterController::class . ':filterByUser');
$app->get('/filterTaskSearch', FilterController::class . ':filterByTask');


