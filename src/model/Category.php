<?php

namespace App\Model;

use Config\AbstractModel;

class Category extends AbstractModel{
    public function getTable(){
        return [
            "id" => "",
            "name" => "",
            "created" => ""
        ];
    }

    public function findAll(){
        $req = "SELECT * FROM category";
        return $this->execRequete($req);
    }   
    
    public function add($name){
        return $this->persist("category",["name"=>$name]);
    }

    public function getCategoryById($id){
        return $this->findBy("category",["id"=>$id]);
    }

    public function deleteCategory($id){
        $req = $req = "DELETE FROM category WHERE id = ".$id;
        $del = $this->pdo->prepare($req);
        $del->execute();
        return $del->rowCount();
    }

    public function updateCategory($id,$name){
        $req = "UPDATE category SET name = :name WHERE id = :id";
        return $this->execRequete($req,[
            "name" => $name,
            "id" => $id
        ]);
    }
}