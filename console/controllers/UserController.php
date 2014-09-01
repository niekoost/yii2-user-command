<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2014 Oostsoft
 * @license   http://www.yiiframework.com/license/
 */

namespace niekoost\console\controllers;

use Yii;
use yii\console\Controller;

/**
 * Allows you to manage users from the command line.
 * Example command:
 * $ ./yii user/create --username=foo --email=foo@bar.org --password=<password>
 * @author Niek Oost <niek@oostsoft.nl>
 * @since  2.0
 */
class UserController extends Controller
{
    /**
     * @var array stores attributes
     */
    private $_attributes = [];

    public function __set($key, $value)
    {
        $this->_attributes[$key] = $value;
    }

    public function __get($key)
    {
        if (isset($this->_attributes[$key])) {
            return $this->_attributes[$key];
        }
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = [];
        $actions['create'] = [
            'class'         => '\niekoost\console\controllers\CreateuserAction',
            'username'      => $this->username,
            'password'      => $this->password,
            'email'         => $this->email,
        ];
        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function options($id) {
        return array('username', 'password', 'email');
    }

}
