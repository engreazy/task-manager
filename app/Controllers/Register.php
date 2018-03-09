<?php

/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/16/2018
 * Time: 6:23 AM
 */
namespace Controllers;
use Models\DatabaseAlgorithm;

class Register extends Validator
{
    private $userTable;

    /**
     * Register constructor.
     * @param DatabaseAlgorithm $userTable
     */
    public function __construct(DatabaseAlgorithm $userTable)
    {
        $this->userTable = $userTable;
    }


    /**
     * @return array
     */
    public function register()
    {
        $title = 'create an account';
        return ['template'=>'register.html.php','title'=>$title];
    }

    /**
     * @return array
     */
    public function verify()
    {
        $title = 'verify your account';
        return ['template'=>'verify.html.php','title'=>$title];
    }

    /**
     *
     */
    public function registerUser()
    {
        $userDetail = $_POST;
        $title = 'create an account';
        if (empty($this->formValidator($userDetail))){
            if (!$_POST['id']) {
                //secures password
                $userDetail['password'] = password_hash($userDetail['password'], PASSWORD_DEFAULT);
                $this->userTable->dataEntry($userDetail);
                $this->accountVerification($userDetail['name'],$userDetail['email']);
            }
        }else{
            $userDetail['msg'] = 'The following errors occured : '.$this->formValidator($userDetail).' ';
            $userDetail['class'] = 'warning';
            return ['template'=>'register.html.php','title'=>$title,'variables'=>$userDetail];
        }
    }

    /**
     *
     */
    private function accountVerification($username,$email)
    {
        $randomstring = "";
        for ($i = 0; $i < 24; $i++){
            $randomstring .= chr(mt_rand(32,126));
        }

        $sender = "Todo Managers";
        $subject = "Account Verification";
        $verifyurl = "http://localhost/todo/index.php?route=todo/read";
        $verifystring = urlencode($randomstring);
        $verifyemail = $email;
        $user = $username;
        $mail_content = <<<_MAIL_
Hi $user,

Thank you for registering an account with Todo Managers.
Please click on the link below to verify your account.
$verifyurl?route=verifymail&email=$verifyemail&verifyid=$verifystring
_MAIL_;
        $emailSender = new EmailSender();
        $emailSender->send($verifyemail,$subject,$mail_content,$sender);
        header("location:index.php?route=user/verify");
    }

    /**
     * @return array
     */
    public function userList()
    {
        $users = $this->userTable->displayData();
        return ['template'=>'userlist.html.php','title'=>'User List',
            'variables'=>[
                'users'=>$users
            ]
        ];
    }

    /**
     * @return array
     */
    public function permissions()
    {
        $parameters = ['id'=> $_GET['id']];
        $user = $this->userTable->findDataById($parameters);

        $reflected = new \ReflectionClass('\Models\Entities\User');
        $constants = $reflected->getConstants();

        return ['template'=>'permissions.html.php','title'=>'Edit Permissions',
            'variables'=>[
                'user'=>$user,
                'permissions'=>$constants
            ]
        ];
    }

    /**
     *
     */
    public function savePermissions()
    {
        $user = [
            'id'=>$_GET['id'],
            'permissions'=>array_sum($_POST['permissions']?$_POST['permissions']:'')
        ];

        $this->userTable->saveData($user);
        header('location:?route=user/read');
    }
}