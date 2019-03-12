<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'autoload.php';

echo '<pre>';

use System\App;
$app = new App();
$app->init();
$app->run();

//use Controllers\Admin;
//$ad = new Admin();
//$ad->render();