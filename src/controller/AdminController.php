<?php

namespace App\Controller;

use Config\AbstractController;
use Config\FlashBag;
use App\Model\Category;

class AdminController extends AbstractController{

    public function index(){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "category";

        $category = new Category();
        $allcategory = $category->findAll()->fetchAll();
        return $this->render("admin/index.php",[
            "allcategory" => $allcategory
        ]);
    }

    public function addCategory(){
        //$postdata = file_get_contents("php://input");
        $response = [
            "status" => 0,
            "message" => ""
        ];
        $name = (isset($_POST["category_name"]))?$_POST["category_name"]:"";
        if($name != ""){
            $response["status"] = 1;
            $category = new Category();
            $one = $category->add($name);
            return $this->render("admin/onecategory.php",[
                "one" => $one
            ]);
        }
        $this->json($response);
    }

    public function getCategory($id){
        $response = [
            "status" => 0,
            "message" => ""
        ];
        $category = new Category();
        $result = $category->getCategoryById($id);
        if(count($result) > 0){
            $response = [
                "status" => 1,
                "message" => $result[0]
            ];
        }
        $this->json($response);
    }

    public function deleteCategory($id){
        $response = [
            "status" => 1,
            "message" => ""
        ];
        $category = new Category();
        $category->deleteCategory($id);
        $this->json($response);
    }

    public function modifyCategory($id){
        $response = [
            "status" => 1,
            "message" => ""
        ];
        $post = file_get_contents('php://input');
        $post = json_decode($post);
        $category = new Category();
        $category->updateCategory($post->category_id,$post->category_name);
        $this->json($response);
    }
}