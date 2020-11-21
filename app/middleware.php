<?php
use Slim\App;
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Response;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\TwigMiddleware;
use Amir_nadjib\Todo_list\Controllers\NotFoundController;

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
        $twig = $container->get(Twig::class);
        $NotFoundController = new NotFoundController($pdo,$twig);
        return $NotFoundController->get($request,$response);
    };
    
    $errorMiddleware->setErrorHandler(HttpNotFoundException::class, $customErrorHandler);
};