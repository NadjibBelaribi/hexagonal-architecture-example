<?php


namespace Amir_nadjib\Todo_list\Endpoints\AddTask;


class AddTaskRequest
{
    private string $title ;
    private string $assigned;
    private string $description;
    private string $dueDate;
    private string $userId ;

    /**
     * AddTaskRequest constructor.
     * @param string $title
     * @param string $assigned
     * @param string $description
     * @param string $dueDate
     * @param string $userId
     */
    public function __construct(string $title, string $assigned, string $description, string $dueDate, string $userId)
    {
        $this->title = $title;
        $this->assigned = $assigned;
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAssigned(): string
    {
        return $this->assigned;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }




}