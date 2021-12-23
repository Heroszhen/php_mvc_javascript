<?php

namespace App\Controller;


use Config\AbstractController;
use App\Model\User;
use App\Service\ToolService;

class ApiController extends AbstractController{
    

    public function getAllCategory(){
        $ts = new ToolService();
        $ts->authorizeAPI();
        $this->json($_SERVER);
    }


    
}