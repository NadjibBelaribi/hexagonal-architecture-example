<?php


namespace AN\Models;


class Comment
{
    private $id;
    private $task_id;
    private $created_by ;
    private $created_at ;
    private $comment;

    /**
     * Comment constructor.
     * @param $id
     * @param $task_id
     * @param $created_by
     * @param $created_at
     * @param $comment
     */
    public function __construct($id, $task_id, $created_by, $created_at, $comment)
    {
        $this->id = $id;
        $this->task_id = $task_id;
        $this->created_by = $created_by;
        $this->created_at = $created_at;
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * @param mixed $task_id
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }



}