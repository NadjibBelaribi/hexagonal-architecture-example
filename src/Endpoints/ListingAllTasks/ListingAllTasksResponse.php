<?php


namespace Amir_nadjib\Todo_list\Endpoints\ListingAllTasks;


class ListingAllTasksResponse
{
    private array $tasks;

    /**
     * ListingAllTasksResponse constructor.
     * @param array $tasks
     */
    public function __construct(array $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }


}