<?php

namespace App\Controller;


use Config\AbstractController;
use App\Model\User;
use App\Service\ToolService;
use App\Model\Article;

class ApiController extends AbstractController{

    public function getAllArticle(){
        $ts = new ToolService();
        $ts->authorizeAPI();

        $article = new Article();
        $allarticle = $article->getAllArticles();
        $this->json(["data"=>$allarticle]);
    }


    
}