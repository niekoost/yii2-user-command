yii2-user-command
=================

Manage users from the commandline, for instance, when you want to create users in your phing-build-script.

To add this package, append to vendor/yiisoft/extensions.php

`   'niekoost/yii2-user-command' =>`
`   array (`
`    'name' => 'niekoost/yii2-user-command',`
`    'version' => '9999999-dev',`
`    'alias' =>`
`    array (`
`      '@niekoost' => $vendorDir . '/niekoost/yii2-user-command',`
`    ),`
`    'bootstrap' => 'niekoost\\Bootstrap',`
`  ),`
 
