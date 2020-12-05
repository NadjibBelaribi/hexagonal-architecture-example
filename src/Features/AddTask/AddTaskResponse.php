<?php


namespace Amir_nadjib\Todo_list\Features\AddTask;


class AddTaskResponse
{
    private int $id ;

    /**
     * AddTaskResponse constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}