<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 4:20 AM
 */
namespace Controllers;
use Models\DatabaseAlgorithm;
use Models\Entities\User;

class TodoController extends Validator
{
    private $todoTable;
    private $categoryTable;
    private $authenticator;

    /**
     * TodoController constructor.
     * @param DatabaseAlgorithm $todoTable
     * @param DatabaseAlgorithm $categoryTable
     * @param \Controllers\Authenticator $authenticator
     */
    public function __construct(DatabaseAlgorithm $todoTable,DatabaseAlgorithm $categoryTable,Authenticator $authenticator)
    {
        $this->todoTable = $todoTable;
        $this->categoryTable = $categoryTable;
        $this->authenticator = $authenticator;
    }

    /**
     * @return array
     */
    public function home()
    {
        $title = 'Todo Management System';
        return ['template'=>'home.html.php','title'=>$title];
    }

    /**
     *
     */
    public function insertData()
    {
        $todoTask = $_POST;
        $title = 'Add Task';
        if (empty($this->formValidator($todoTask))){
            if (!$_POST['id'])
            {
                $user= $this->getUser();//assigns entry for each user
                $user->addTodo($todoTask);

                $todoTask['msg'] = 'task added successfully';
                $todoTask['class'] = 'success';
                return ['template'=>'form.html.php','title'=>$title,'variables'=>$todoTask];
            }else{
                $this->updateData($todoTask);
            }
        }else{
            $todoTask['msg'] = 'Please Check the following : '.$this->formValidator($todoTask).' on your input';
            $todoTask['class'] = 'warning';
            return ['template'=>'form.html.php','title'=>$title,'variables'=>$todoTask];
        }

    }

    /**
     * @return array
     */
    public function todoList()
    {
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $offset = ($page - 1)*10;
        $todo = $this->todoTable->displayData('date DESC',10,$offset);
        $title = 'Show Entry';
        $user = $this->getUser();
        $totalTask = $this->todoTable->total();
        return ['template'=>'content.html.php','title'=>$title,
        'variables'=>[
            'totalTask'=>$totalTask,
                'todo'=>$todo,
                'user'=>$user,
                'currentPage'=>$page
              ]
            ];
    }

    /**
     * @param $data
     * @return array
     */
    private function updateData($data)
    {
        $todoId = ['id',$data['id']];
        $todoData = $this->todoTable->findData($todoId);

        $user = $this->getUser();
        $userId = $this->getUserId($user);
        if($userId !== $todoData[0]->user_id && !$user->hasPermission(User::EDIT_TODO)){
            header("Location:index.php?route=todo/home");
            exit();
        }else{
            $user->addTodo($data);
            header("Location:index.php?route=todo/read");
        }
    }

    /**
     *
     */
    public function editData()
    {
        $user = $this->getUser();
        $categories = $this->categoryTable->displayData();

        $parameters = ['id'=> isset($_GET['id'])?$_GET['id']:''];
        $todo = $this->todoTable->findDataById($parameters);
        $title = 'Edit Entry';
        return ['template'=>'form.html.php','title'=>$title,
            'variables'=>[
                'msg'=>'',
                'class'=>'',
                'user'=>$user,
                'todo'=>$todo,
                'categories'=>$categories
            ]
        ];
    }

    /**
     *
     */
    public function removeData()
    {
        $parameters = ['id'=> $_POST['id']];
        $user = $this->getUser();
        $userId = $this->getUserId($user);

        $todoId = ['id',$parameters['id']];
        $todoData = $this->todoTable->findData($todoId);

        if($userId !== $todoData[0]->user_id && !$user->hasPermission(User::DELETE_TODO)){
            header("Location:index.php?route=todo/home");
            exit();
        }else{
            $this->todoTable->removeData($parameters);
            header("Location:index.php?route=todo/read");
        }
    }


    /**
     * @param $user
     * @return null
     */
    private function getUserId($user)
    {
        $userId = isset($user->id) ? $user->id:null;
        return $userId;
    }

    /**
     * @return mixed
     */
    private function getUser()
    {
        $user = $this->authenticator->getUser();
        return $user[0];
    }

}