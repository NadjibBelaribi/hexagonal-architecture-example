<?php


namespace Amir_nadjib\Todo_list\Features\TasksHome;


class TasksHomeResponse
{
    private array $tasks ;
    private array $users ;

    /**
     * TasksHomeResponse constructor.
     * @param array $tasks
     * @param array $users
     */
    public function __construct(array $tasks, array $users,int $choice)
    {
        if($choice) $this->tasks = $tasks;
        else $this->users = $users;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }


}