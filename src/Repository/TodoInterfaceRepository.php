<?php


namespace Amir_nadjib\Todo_list\Repository;

<<<<<<< HEAD

interface TodoInterfaceRepository
{
    public function getUserByEmail (string $authEmail):array ;
    public function getAllTasks ():array ;
    public function getAllUsers():array ;
=======
interface TodoInterfaceRepository
{
    public function getUserByEmail (string $authEmail):array ;
    public function getAllTasksTitles ():array ;
>>>>>>> c7db92740e576144a775507b3c3d87a8f5150f1f
    public function insertTask(string $currUser,string $userId, string $title, string $description,string $dueDate):int ;
    public function insertComment(string $taskId, string $createdBy, string $comment):string ;
    public function getComments (string $taskId):array ;
    public function getTaskById (string $tid):array ;
    public function getUserById (string $uid):array ;
<<<<<<< HEAD
    public function getUserAssigned (string $uid):array ;
    public function filterByTask(string $tid):array;
    public function filterByUser (string $tid):array;


}
=======


}
>>>>>>> c7db92740e576144a775507b3c3d87a8f5150f1f
