<?php
use Slim\App;
 use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Response;
use Slim\Exception\HttpNotFoundException;
 use Amir_nadjib\Todo_list\Endpoints\NotFound\NotFoundController ;

 return function (App $app): void {
    $errorMiddleware = $app->addErrorMiddleware(true,true,true);

    $customErrorHandler = function (
        ServerRequestInterface $request,
        Throwable $exception,
        bool $displayErrorDetails
    ) use ($app) {
        $response = (new Response())->withStatus(404);
        $container = $app->getContainer();

        $pdo = $container->get(PDO::class);

        $NotFoundController = new NotFoundController();
        return $NotFoundController->get($request,$response);
    };
    
    $errorMiddleware->setErrorHandler(HttpNotFoundException::class, $customErrorHandler);
};