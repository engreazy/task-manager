<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:42 AM
 */
namespace Controllers;
use Models\DatabaseAlgorithm;
use Models\Entities\User;

class TodoRoutes Implements IRoutes
{
    private $todoTable;
    private $userTable;
    private $categoryTable;
    private $authenticator;
    private $todoCategoryTable;

    /**
     * TodoRoutes constructor.
     */
    public function __construct()
    {
        $this->todoTable = new DatabaseAlgorithm('todo','id','Models\Entities\Todo',[&$this->userTable,&$this->todoCategoryTable]);
        $this->userTable = new DatabaseAlgorithm('user','id','Models\Entities\User',[&$this->todoTable]);
        $this->categoryTable = new DatabaseAlgorithm('category','id');
        $this->authenticator = new Authenticator($this->userTable,'email','password');
        $this->todoCategoryTable = new DatabaseAlgorithm('todo_category','categoryId');
    }

    /**
     *
     */
    public function getRoutes()
    {
        // TODO: Implement getRoutes() method.
        $todoController = new TodoController($this->todoTable,$this->categoryTable,$this->authenticator);
        $registerController = new Register($this->userTable);
        $loginController = new Login($this->authenticator);
        $categoryController = new Category($this->categoryTable);
        /** @var TYPE_NAME $todoController */
        $routes = [
            'user/permissions'=>[
              'GET'=>[
                  'controller'=>$registerController,
                  'action'=>'permissions'
              ],
                'POST'=>[
                    'controller'=>$registerController,
                    'action'=>'savePermissions'
                ],
                'login'=>true,
                'permissions'=>User::EDIT_USER_ACCESS
            ],
            'user/read'=>[
                'GET'=>[
                    'controller'=>$registerController,
                    'action'=>'userList'
                ],
                'login'=>true,
                'permissions'=>User::EDIT_USER_ACCESS
            ],
            'user/register'=>[
              'GET'=>[
                  'controller'=>$registerController,
                  'action'=>'register'
              ],
                'POST'=>[
                    'controller'=>$registerController,
                    'action'=>'registerUser'
                ]
            ],
            'user/verify'=>[
                'GET'=>[
              'controller'=>$registerController,
                    'action'=>'verify'
                ]
            ],
            'login/error'=>[
              'GET'=>[
                  'controller'=>$loginController,
                  'action'=>'error'
              ]
            ],
            'login'=>[
              'GET'=>[
                  'controller'=>$loginController,
                  'action'=>'loginForm'
              ],
                'POST'=>[
                  'controller'=>$loginController,
                    'action'=>'processLogin'
                ],
            ],
            'login/success'=>[
              'GET'=>[
                  'controller'=>$loginController,
                  'action'=>'success'
              ],
                'login'=>true
            ],
            'logout'=>[
              'GET'=>[
                  'controller'=>$loginController,
                  'action'=>'logout'
              ]
            ],
            'todo/read'=>[
                'GET'=>[
                    'controller'=>$todoController,
                    'action'=>'todoList'
                ]
            ],
            'todo/edit'=>[
                'POST'=>[
                    'controller'=>$todoController,
                    'action'=>'insertData'
                ],
                'GET'=>[
                    'controller'=>$todoController,
                    'action'=>'editData'
                ],
                'login'=>true
            ],
            'todo/delete'=>[
                'POST'=>[
                    'controller'=>$todoController,
                    'action'=>'removeData'
                ],
                'login'=>true
            ],
            'todo/home'=>[
                'GET'=>[
                    'controller'=>$todoController,
                    'action' =>'home'
                ]
            ],
            'category/edit'=>[
                'POST'=>[
                    'controller'=>$categoryController,
                    'action'=>'insertData'
                ],
                'GET'=>[
                    'controller'=>$categoryController,
                    'action'=>'editData'
                ],
                'login'=>true,
                'permissions'=> User::EDIT_CATEGORIES
            ],
            'category/read'=>[
                'GET'=>[
                    'controller'=>$categoryController,
                    'action'=>'categoryList'
                ],
                'login'=>true,
                'permissions'=>User::LIST_CATEGORIES
            ],
            'category/delete'=>[
                'POST'=>[
                    'controller'=>$categoryController,
                    'action'=>'removeData'
                ],
                'login'=>true,
                'permissions'=>User::REMOVE_CATEGORIES
            ],
            '404'=>[
              'GET'=>[
                'controller'=>$categoryController,
                'action'=>'pageNotFound'
              ]
            ]
        ];
        return $routes;
    }

    /**
     * @return Authenticator
     */
    public function getAuthenticator()
    {
        return $this->authenticator;
    }

    /**
     * @param $permission
     * @return bool
     */
    public function checkPermission($permission)
    {
        $user = $this->authenticator->getUser();
        return $user[0] && $user[0]->hasPermission($permission) ? true : false;
    }
}