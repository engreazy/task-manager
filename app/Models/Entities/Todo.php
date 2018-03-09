<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/17/2018
 * Time: 7:43 PM
 */
namespace Models\Entities;
use Models\DatabaseAlgorithm;
class Todo
{
    public $id;
    public $task;
    public $description;
    public $date;
    public $reminder;
    public $user_id;
    private $userTable;
    private $user;
    private $todoCategoryTable;

    /**
     * Todo constructor.
     * @param DatabaseAlgorithm $userTable
     * @param DatabaseAlgorithm $todoCategoryTable
     * @internal param DatabaseAlgorithm $usersTable
     */
    public function __construct(DatabaseAlgorithm $userTable,DatabaseAlgorithm $todoCategoryTable)
    {
        $this->userTable = $userTable;
        $this->todoCategoriesTable = $todoCategoryTable;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        $userId = ['id'=>$this->user_id];
        if (empty($this->user)){
            $this->user = $this->userTable->findDataById($userId);
        }
        return $this->user;
    }

    /**
     * @param $categoryId
     */
    public function addCategory($categoryId)
    {
        $todoCat = ['todoId'=>$this->id,'categoryId'=>$categoryId];
        $this->todoCategoryTable->saveData($todoCat);
    }
}