<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/16/2018
 * Time: 3:56 PM
 */
namespace Models\Entities;
use Models\DatabaseAlgorithm;
class User
{
    const EDIT_TODO = 1;
    const DELETE_TODO = 2;
    const LIST_CATEGORIES = 4;
    const EDIT_CATEGORIES = 8;
    const REMOVE_CATEGORIES = 16;
    const EDIT_USER_ACCESS = 32;
    public $id;
    public $name;
    public $email;
    public $password;
    private $todoTable;
    private $permissions;

    /**
     * User constructor.
     * @param $todoTable
     * @internal param $tableName
     */
    public function __construct(DatabaseAlgorithm $todoTable)
    {
        $this->todoTable = $todoTable;
    }

    /**
     *
     */
    public function getTodo()
    {
        $todoId = ['user_id',$this->id];
        $result  = $this->todoTable->findData($todoId);
        return $result;
    }

    /**
     * @param $todo
     * @return mixed
     */
    public function addTodo($todo)
    {
        $todo['user_id'] = $this->id;
        return $this->todoTable->saveData($todo);
    }

    /**
     * @param $permission
     * @return int
     */
    public function hasPermission($permission)
    {
        return $this->permissions & $permission;
    }
}