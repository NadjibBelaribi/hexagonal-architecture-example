<?php


use Amir_nadjib\Todo_list\Endpoints\ListingAllTasks\ListingAllTasksController;

/****************** API TESTS ************/

//- listing des tâches
$app->get('/getTasks', ListingAllTasksController::class);

