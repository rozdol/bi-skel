<?php

$GLOBALS['starttime']=microtime(true);
define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
require ROOT . DS.'bi'.DS.'vars.php';
require(APP_DIR.DS.'config'.DS.'config.php');
// echo '<pre>';print_r($GLOBALS);echo '</pre>';exit;
// set_time_limit ( 3000 );
@ini_set('zlib.output_compression', 0);
@ini_set('implicit_flush', 1);
@ob_end_clean();
set_time_limit(0);
ob_implicit_flush(1);

use Rozdol\App\App;

$app=App::getInstance();
$app->run();
