<?php


namespace Amir_nadjib\Todo_list\Endpoints\ListingComments;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ListingCommentsController
{
    private ListingCommentsService $service ;

    /**
     * ListingCommentsController constructor.
     * @param ListingCommentsService $service
     */
    public function __construct(ListingCommentsService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response,array $args):ResponseInterface
    {
        // TODO: Implement __invoke() method.
       $comments =  $this->service->getComments($args['taskId']) ;
      // var_dump($comments);
        return $response->withStatus(200, sprintf('Comments List %s',json_encode($comments)));
    }

}