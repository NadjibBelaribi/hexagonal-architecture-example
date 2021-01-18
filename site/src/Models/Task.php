<?php

namespace Amir_nadjib\Todo_list\Models;

class Task
{
    private $title;
    private $description;
    private $created_by ;
    private $created_at ;
    private $assigned_to;
    private $due_date ;

    /**
     * Task constructor.
     * @param $title
     * @param $description
     * @param $created_by
     * @param $created_at
     * @param $assigned_to
     * @param $due_date
     */
    public function __construct($title, $description, $created_by, $created_at, $assigned_to, $due_date)
    {
        $this->title = $title;
        $this->description = $description;
        $this->created_by = $created_by;
        $this->created_at = $created_at;
        $this->assigned_to = $assigned_to;
        $this->due_date = $due_date;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getAssignedTo()
    {
        return $this->assigned_to;
    }

    /**
     * @param mixed $assigned_to
     */
    public function setAssignedTo($assigned_to)
    {
        $this->assigned_to = $assigned_to;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }


}
