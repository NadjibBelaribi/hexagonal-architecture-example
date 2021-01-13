<?php


namespace Amir_nadjib\Todo_list\Endpoints\TaskDetails;

use DateTime;

class TaskDetailsResponse
{
    private int $id ;
    private string $created_by ;
    private string $assigned_to ;
    private string $title ;
    private string $description;
    private string $created_at ;
    private string $due_date;

    /**
     * TaskDetailsResponse constructor.
     * @param int $id
     * @param string $created_by
     * @param string $assigned_to
     * @param string $title
     * @param string $description
     * @param string $created_at
     * @param string $due_date
     */
    public function __construct(int $id, string $created_by, string $assigned_to, string $title, string $description, string $created_at, string $due_date)
    {
        $this->id = $id;
        $this->created_by = $created_by;
        $this->assigned_to = $assigned_to;
        $this->title = $title;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->due_date = $due_date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getAssignedTo(): string
    {
        return $this->assigned_to;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->due_date;
    }


}