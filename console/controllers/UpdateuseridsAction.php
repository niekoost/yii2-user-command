<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */


namespace niekoost\console\controllers;

use common\models\User;

/**
 * Action to update ids in the usermodel
 */
class UpdateuseridsAction extends \yii\base\Action
{

    public $username;

    private $_attributes = [];

    public function __set($key, $value)
    {
        $this->_attributes[$key] = $value;
    }


    /**
     * Load specified generator and generate files
     */
    public function run()
    {
        $attributes = [];
        if($this->username === null) {
            throw new \Exception('username is required');
        } 
        $query = "UPDATE `user` SET ";
        foreach($this->_attributes as $_k=>$_v) {
            if(substr($_k, -3) == '_id') {
                // only update ids
                $query .= '`' . $_k . '`=' . $_v;
            }
        }
        $query .= " WHERE `username`=:username";

        $q = \Yii::$app->db->createCommand($query);
        $q->bindValues([':username'=>$this->username ]);
        $q->execute();
    }

}
