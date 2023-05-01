<?php
declare(strict_types=1);

use App\Controllers\BaseController;
use App\Controllers\HomeController;

require_once '../vendor/autoload.php';
require_once "autoload.php";
require_once "request_handler.php";

$base = new BaseController();
if( $base->isSetDb() === false) {
    echo "DB not set :( "; exit;
}

$controller = new HomeController();
$controller->index();