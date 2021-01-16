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

    public function __invoke(RequestInterface $request, ResponseInterface $response):ResponseInterface
    {

        $taskId = $_SESSION['taskId'] ;
        $created_by = $_SESSION['userId'] ;
        $comment = $_POST['comment'];

        $request = new AddCommentRequest($taskId,$created_by,$comment) ;
        $responseData = json_encode($this->service->addComment($request)) ;
        $response->getBody()->write($responseData) ;
        return $response->withStatus(200 ,'Comment added ! ');
    }

}
