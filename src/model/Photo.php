<?php

namespace App\Model;

use Config\AbstractModel;

class Photo extends AbstractModel{

    public function getTable(){
        return [
            "id" => "",
            "origin" => "",
            "name" => "",
            "created" => ""
        ];
    }

    public function addOnePhoto($file){
        $parameters = $this->getTable();
        unset($parameters["id"],$parameters["created"]);
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $parameters = [
            "origin" => $file["name"],
            "name" => uniqid().".".$extension
        ];
        $tab = $this->persist("photo",$parameters);
        move_uploaded_file($file['tmp_name'], 'public/photos/'.$parameters["name"]);
        return $tab;
    }

    public function getAllPhotos(){
        return $this->findBy("photo");
    }

    public function deleteOnePhoto($id){
        $onephoto = $this->findBy("photo",["id"=>$id])[0];
        $this->remove("photo",$id);
        unlink("public/photos/".$onephoto["name"]);
    }
    
}