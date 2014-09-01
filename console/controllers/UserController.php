<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2014 Oostsoft
 * @license   http://www.yiiframework.com/license/
 */

namespace niekoost\yii2-user-command\console\controllers;

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

    public $generators = [
        'create'        => ['class' => '\niekoost\yii2-user-command\console\controllers\CreateuserAction'],
    ];

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
        $actions[$name] = [
            'class'         => '\niekoost\yii2-user-command\console\controllers\CreateuserAction',
            'generatorName' => 'create',
        ];
        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function options($id)
    {
        $generator = Yii::createObject($this->generators[$id]);
        return array_merge(
            parent::options($id),
            ['generate'],
            array_keys($generator->attributes) // global for all actions -- TODO this is broken
        );
    }
}
