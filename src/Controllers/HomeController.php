<?php

namespace Hakan\Hello\Controllers;

use Hakan\Hello\Models\User;
use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class HomeController
{
    private PDO $pdo;
    private Twig $twig;

    public function __construct(PDO $pdo, Twig $twig)
    {
        $this->pdo = $pdo;
        $this->twig = $twig;
    }

    public function get (RequestInterface $request, ResponseInterface $response) {

        return $this->twig->render($response, 'home.tpl');
    }

}
