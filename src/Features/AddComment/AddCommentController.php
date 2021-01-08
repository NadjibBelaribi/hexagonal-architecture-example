<?php


namespace Amir_nadjib\Todo_list\Features\AddComment;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddCommentController
{
    private AddCommentService $service ;

    /**
     * AddCommentController constructor.
     * @param AddCommentService $service
     */
    public function __construct(AddCommentService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response,array $args):ResponseInterface
    {

            $taskId = $args['taskId'] ;
            $created_by = $args['userId'] ;
            $comment = $_POST['comment'];
            $request = new AddCommentRequest($taskId,$created_by,$comment) ;
            $responseData = $this->service->addComment($request) ;
            $response->getBody()->write(json_encode($responseData->getComment())) ;
            return $response->withStatus(200 ,'Comment added ! ');
    }

}