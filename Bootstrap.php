<?php
/**
 * @link http://www.oostsoft.nl/
 * @copyright Copyright (c) 2014 Oostsoft, Bedum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace niekoost;

use yii\base\Application;
use yii\base\BootstrapInterface;


/**
 * Class Bootstrap
 * @package niekoost\user
 * @author Niek Oost <niek@oostsoft.nl>
 */
class Bootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $app->controllerMap['user'] = 'niekoost\console\controllers\UserController';
        }
    }
}
