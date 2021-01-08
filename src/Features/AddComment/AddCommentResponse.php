<?php


namespace Amir_nadjib\Todo_list\Features\AddComment;


class AddCommentResponse
{
    private string $comment ;

    /**
     * AddCommentResponse constructor.
     * @param string $commentId
     */
    public function __construct(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

}