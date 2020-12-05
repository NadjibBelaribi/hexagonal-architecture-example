<?php


namespace Amir_nadjib\Todo_list\Features\ListingComments;


use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;

class ListingCommentsService
{
    private TodoInterfaceRepository $repository ;

    /**
     * ListingCommentsService constructor.
     * @param TodoInterfaceRepository $repository
     */
    public function __construct(TodoInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getComments(int $taskId):ListingCommentsResponse {
        $comments  = $this->repository->getComments($taskId) ;
        return new ListingCommentsResponse($comments) ;
    }
}