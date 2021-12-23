<?php

namespace App\Model;

use Config\AbstractModel;

class Comment extends AbstractModel{

    public function getTable(){
        return [
            "id" => "",
            "user_id" => "",
            "text" => "",
            "article_id" => "",
            "created" => ""
        ];
    }

}