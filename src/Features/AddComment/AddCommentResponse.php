<?php


namespace Amir_nadjib\Todo_list\Features\AddComment;


class AddCommentResponse
{
    private int $commentId ;

    /**
     * AddCommentResponse constructor.
     * @param int $commentId
     */
    public function __construct(int $commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->commentId;
    }

}