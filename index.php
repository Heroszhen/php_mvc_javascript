<?php
require_once "vendor/autoload.php";

use Config\Kernel;

session_start();

$kernel = new Kernel();
$kernel->run();