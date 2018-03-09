<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/14/2018
 * Time: 11:20 PM
 */
namespace Controllers;
class Login extends Validator
{
    private $authenticator;

    public function __construct(Authenticator $authenticator)
    {
        /** @var TYPE_NAME $authenticator */
        $this->authenticator = $authenticator;
    }

    /**
     * @return array
     */
    public function error()
    {
        return ['template'=>'loginerror.html.php','title'=>'You are not logged in'];
    }

    /**
     * @return array
     */
    public function loginForm()
    {
        return ['template'=>'login.html.php','title'=>'Log In','variables'=>['class'=>'','msg'=>'']];
    }

    /**
     *
     */
    public function processLogin()
    {
        if ($this->authenticator->login($_POST['email'],$_POST['password']))
        {
            header('location:?route=login/success');
            exit();
        }else{
            return ['template'=>'login.html.php',
                'title'=>'Log In',
                'variables'=>[
                    'error'=>'Invalid username/password',
                    'class'=>'',
                    'msg'=>''
                ]
            ];
        }
    }

    /**
     * @return array
     */
    public function success()
    {
        return ['template'=>'loginsuccess.html.php','title'=>'Login Successful'];
    }

    public function logout()
    {
        session_destroy();
        $_SESSION = [];
        return ['template'=>'logout.html.php','title'=>'You have been logged out'];
    }
}