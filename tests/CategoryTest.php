<?php

use PHPUnit\Framework\TestCase;
use App\Model\Category;

class CategoryTest extends TestCase{

    public function testFindAll(){
        $category = new Category();
        $tab = $category->findAll()->fetchAll();
        $this->assertIsArray(
            $tab,
            "assert variable is not an array"
        );
    }


    public function testGetCategoryById(){
        $id = 1;
        $category = new Category();
        $tab = $category->getCategoryById($id);
        $onecategory = $tab[0];
        $this->assertEquals($id, $onecategory["id"]);
    }
}