<?php

namespace App\Service;

class ToolService{

    /**
     * sort a two-dimensional array
     * order : 1->up, 2->down
     */
    public function sortTDArray(array $tab, string $index, int $order):array{
        uasort($tab, function (array $a, array $b) use($index,$order) {
            if($order == 1)return $a[$index] <=> $b[$index];
            else return $b[$index] <=> $a[$index];
        });
        return $tab;
    }   
}