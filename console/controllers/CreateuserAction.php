<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */


namespace niekoost\console\controllers;

use common\models\User;

class CreateuserAction extends \yii\base\Action
{

    public $username, $password, $email;

    /**
     * Load specified generator and generate files
     */
    public function run()
    {
        $attributes = [];
        if($this->username === null) {
            throw new \Exception('username is required');
        } 
        if($this->password === null) {
            throw new \Exception('password is required');
        }
        if($this->email === null) {
            throw new \Exception('email is required');
        }

        $attributes['username']=$this->username;
        $attributes['password']=$this->password;
        $attributes['email']=$this->email;
        
        $result = User::create($attributes);
        if($result === null) {
            // @todo find out why
            throw new \Exception('User could not be created');
        }
    }

}
