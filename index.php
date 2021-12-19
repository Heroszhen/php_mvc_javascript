<?php
require_once "vendor/autoload.php";
require_once "src/service/StoreService.php";

use Config\Kernel;

session_start();

$kernel = new Kernel();
$kernel->run();

