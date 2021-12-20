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
}