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
        $actions['updateids'] = [
            'class'         => '\niekoost\console\controllers\UpdateuseridsAction',
            'username'      => $this->username,
        ];
        $params = Yii::$app->request->getParams();
        foreach($params as $param) {
            if(strpos($param, '--') == 0 && strpos($param, '_id=') !== FALSE) {
                // only accept id-updates
                $param = explode('=', $param);
                $actions['updateids'][substr($param[0], 2)] = $param[1];
            }
        }

        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function options($id) {
        if($id == 'create') {
            return array('username', 'password', 'email');
        } else if($id == 'updateids') { 
            $options = ['username'];
            $params = Yii::$app->request->getParams();
            foreach($params as $param) {
                if(strpos($param, '--') == 0 && strpos($param, '_id=') !== FALSE) {
                    // only accept id-updates
                    $param = explode('=', $param);
                    $options[] = substr($param[0], 2);
                }
            }
            return $options;
        }
    }

}
