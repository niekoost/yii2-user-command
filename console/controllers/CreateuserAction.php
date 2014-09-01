<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */


namespace niekoost\console\controllers;


class CreateuserAction extends \yii\base\Action
{

    /**
     * Load specified generator and generate files
     */
    public function run()
    {
        $attributes = ?;
        User::create($attributes);
    }

}
