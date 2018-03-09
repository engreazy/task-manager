<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/16/2018
 * Time: 6:41 AM
 */
namespace Controllers;
use Models\Context;
class Validator
{
    private $authenticator;
    /**
    *checks for empty fields
     * @param array $fields
     * @return string
     */
    protected function formValidator($fields = [])
    {
        $errors = [];
        foreach ($fields as $fieldname => $value){
            if (!isset($fieldname) || empty($value)){
                if ($fieldname !== 'id' ){
                    $errors[] = $fieldname;
                }
            }
            if (strtolower($fieldname) === 'email'){
                if (count($this->checkEmailStatus(strtolower($value)))>0){
                    $errors[] = ' account already registered';
                }
            }
        }
        $errorFields = implode(', ',$errors);
        $errorFields = rtrim($errorFields,',');
        return $errorFields;
    }

    /**
     *
     */
    private function checkEmailStatus($email)
    {
        $this->authenticator = @new namespace\TodoRoutes();
        $user = $this->authenticator->getAuthenticator();
        return $user->getUserDetails($email);
    }

}