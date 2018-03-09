<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/18/2018
 * Time: 12:24 PM
 */
namespace Controllers;
use Models\DatabaseAlgorithm;
class Category extends  Validator
{
    private $categoryTable;

    public function __construct(DatabaseAlgorithm $categoryTable)
    {
        $this->categoryTable = $categoryTable;
    }
    /**
     * @return array
     */
    public function insertData()
    {
        $task_list = $_POST;
        $title = 'Add Category';
        if (empty($this->formValidator($task_list))){
            if (!$_POST['id'])
            {
                $this->categoryTable->dataEntry($task_list);
                $task_list['msg'] = 'category added successfully';
                $task_list['class'] = 'success';
                return ['template'=>'editcategory.html.php','title'=>$title,'variables'=>$task_list];
            }else{
                $this->updateData($task_list);
            }
        }else{
            $task_list['msg'] = 'Please Check the following : '.$this->formValidator($task_list).' on your input';
            $task_list['class'] = 'warning';
            return ['template'=>'editcategory.html.php','title'=>$title,'variables'=>$task_list];
        }

    }
    public function editData()
    {
        $parameters = ['id'=> isset($_GET['id'])?$_GET['id']:''];
        $category = $this->categoryTable->findDataById($parameters);

        $title = 'Add/Edit Category';
        return ['template'=>'editcategory.html.php','title'=>$title,
            'variables'=>[
                'msg'=>'',
                'class'=>'',
                'category'=> isset($category)?$category:null
            ]
        ];
    }

    /**
     * @return array
     */
    public function categoryList()
    {
        $categories = $this->categoryTable->displayData();
        $title = 'Todo Categories';
        return ['template'=>'categories.html.php','title'=>$title,
            'variables'=>[
                'categories'=>$categories
            ]
        ];
    }

    /**
     * @internal param $data
     */
    public function updateData()
    {
        $data = $_POST;
        $this->categoryTable->updateData($data);
        header("Location:index.php?route=category/read");
    }

    /**
     *
     */
    public function removeData()
    {
        $parameters = ['id'=> $_POST['id']];
        $this->categoryTable->removeData($parameters);
        header("Location:index.php?route=category/read");

    }

    /**
     * @return array
     */
    public function pageNotFound()
    {
        return ['template'=>'404.html.php','title'=>'Page Not Found'];
    }
}