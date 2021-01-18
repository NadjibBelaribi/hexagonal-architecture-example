<?php
namespace Amir_nadjib\Todo_list\Features\NotFound ;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class NotFoundController
{
    private Twig $twig ;

    /**
     * NotFoundController constructor.
     * @param Twig $twig
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function get(RequestInterface $request, ResponseInterface $response)
    {

        return $this->twig->render($response, 'notfound.tpl');
    }

}