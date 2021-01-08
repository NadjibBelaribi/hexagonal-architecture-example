<?php


namespace Amir_nadjib\Todo_list\Repository;

interface TodoInterfaceRepository
{
    public function getUserByEmail (string $authEmail):array ;
    public function getAllTasksTitles ():array ;
    public function insertTask(string $currUser,string $userId, string $title, string $description,string $dueDate):int ;
    public function insertComment(string $taskId, string $createdBy, string $comment):string ;
    public function getComments (string $taskId):array ;
    public function getTaskById (string $tid):array ;
    public function getUserById (string $uid):array ;


}