<?php
// 1 es para ambiente de desarrollo. 
// 2 es para ambiente de produccion.
$enviroment = 1;

if ($enviroment == 1) {
    // change the following paths if necessary
    //$yii = 'C:\xampp\framework\yii.php';
	$yii = 'C:\wamp\www\yii\framework\yii.php';
    $config = dirname(__FILE__) . '/protected/config/main_development.php';
    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 2);
} else if ($enviroment == 2) {
    // change the following paths if necessary
    $yii = '/var/www/vhosts/via-college.com/framework/yii.php';
    $config = dirname(__FILE__) . '/protected/config/main_production.php';
}else if ($enviroment == 3) {
    // change the following paths if necessary
    $yii = '/var/www/vhosts/via-college.com/framework/yii.php';
    $config = dirname(__FILE__) . '/protected/config/main_testing.php';
}
    // remove the following lines when in production mode
    // defined('YII_DEBUG') or define('YII_DEBUG',true);
    // specify how many levels of call stack should be shown in each log message
    // defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


require_once($yii);
Yii::createWebApplication($config)->run(); //
