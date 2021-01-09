<?php


namespace Amir_nadjib\Todo_list\Features\AddComment;


class AddCommentRequest
{
    private string $taskId ;
    private string $created_by ;
    private string $comment ;

    /**
     * AddCommentRequest constructor.
     * @param string $taskId
     * @param string $created_by
     * @param string $comment
     */
    public function __construct(string $taskId, string $created_by, string $comment)
    {
        $this->taskId = $taskId;
        $this->created_by = $created_by;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getTaskId(): string
    {
        return $this->taskId;
    }

    /**
     * @return string
     */
    public function getCreatedBy(): string
    {
        return $this->created_by;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

}
