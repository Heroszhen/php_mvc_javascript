<?php

namespace App\Service;

class ToolService{

    /**
     * sort a two-dimensional array
     * order : 1->up, 2->down
     */
    public function sortTDArray(array $tab, string $index, int $order):array{
        uasort($tab, function (array $a, array $b) use($index,$order) {
            if($order == 1)return strtolower($a[$index]) <=> strtolower($b[$index]);
            else return $b[$index] <=> $a[$index];
        });
        return $tab;
    }
    
    public function authorizeAPI(){
        $http_origin = $_SERVER["HTTP_ORIGIN"];
        if(in_array($http_origin,allowed_domains)){
            header("Content-Type: application/json; charset=UTF_8");
            header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
            header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
            header("Access-Control-Allow-Origin: *");
        }
    }
}