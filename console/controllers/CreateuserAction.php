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

        $user = new User;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->email = $this->email;

        $result = $user->save();
        if($result === FALSE) {
            // @todo find out why
            throw new \Exception('User could not be created');
        }
    }

}
