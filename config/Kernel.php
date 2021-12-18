<?php

namespace Config;

use Config\Router;
use Config\Database\ConnectMysql;


class Kernel{
    public function run(){
        $router = new Router();
        $dispatcher = $router->setRoutes();
        $router->getRouter($dispatcher);
    }

    public function getPDO(){
        return ConnectMysql::getPDO();
    }
}