<?php

namespace Config;

abstract class AbstractController{
    private $templateEngine;

    public function __construct() {
      
    }

    protected function render($file,$args=[]){
        require_once dirname(__DIR__)."/src/view/".$file;
    }

    protected function Toredirect($url){
        header("Location: /".$url);
    }

    protected function json(array $response){
        echo json_encode($response);
    }
}