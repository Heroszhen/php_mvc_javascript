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

    public function getAllArticles(){
        return $this->findBy("article");
    }

    public function getArticleById($id){
        return $this->findBy("article",["id"=>$id]);
    }

    public function addOneArticle(array $params){
        unset($params["id"],$params["created"]);
        $params["text"] = htmlspecialchars($params["text"]);
        return $this->persist("article",$params);
    }
    public function updateOneArticle(array $params){
        unset($params["created"]);
        $params["text"] = htmlspecialchars($params["text"]);//htmlentities
        return $this->persist("article",$params,$params["id"]);
    }

    public function deleteOneArticleById(int $id){
        $req = "DELETE FROM article WHERE id = ".$id;
        $del = $this->pdo->prepare($req);
        $del->execute();
        return $del->rowCount();
    }
}