<?php

namespace App\Model;

use Config\AbstractModel;

class User extends AbstractModel{

    public function getTable(){
        return [
            "id" => "",
            "email" => "",
            "password" => "",
            "firstname" => "",
            "created" => "",
            "role" => ""
        ];
    }

    public function findUserByEmail($email){
        $req = "SELECT * FROM user where email = :email";
        return $this->execRequete($req,["email" => $email]);
    }
}