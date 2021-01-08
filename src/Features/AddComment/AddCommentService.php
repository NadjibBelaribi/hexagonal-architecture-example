<?php


namespace Amir_nadjib\Todo_list\Features\AddComment;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class AddCommentService
{
    private TodoInterfaceRepository $repository ;

    /**
     * AddCommentService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addComment(AddCommentRequest $request):AddCommentResponse {
       $comment =  $this->repository->insertComment($request->getTaskId(),$request->getCreatedBy(),$request->getComment()) ;
        return new AddCommentResponse($comment) ;
    }


}