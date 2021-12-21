<?php

namespace App\Model;

use Config\AbstractModel;

class Article extends AbstractModel{

    public function getTable(){
        return [
            "id" => "",
            "title" => "",
            "text" => "",
            "category_id" => "",
            "created" => ""
        ];
    }

    public function getArticleById($id){
        return $this->findBy("article",["id"=>$id]);
    }

    public function addOneArticle(array $params){
        unset($params["id"],$params["created"]);
        return $this->persist("article",$params);
    }
    public function updateOneArticle(array $params){
        unset($params["created"]);
        $params["text"] = htmlspecialchars_decode($params["text"]);
        return $this->persist("article",$params,$params["id"]);
    }
}