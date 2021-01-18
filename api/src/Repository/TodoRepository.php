<?php


namespace Amir_nadjib\Todo_list\Repository;


use PDO;

class TodoRepository implements TodoInterfaceRepository
{

    private PDO $pdo ;

    /**
     * TodoRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTasksTitles ():array
    {
        return  $this->pdo->query('select id , title from todos ')->fetchAll(PDO::FETCH_ASSOC);
    }

}