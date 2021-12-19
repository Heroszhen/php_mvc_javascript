<?php

namespace App\Controller;

use Config\AbstractController;
use Config\FlashBag;
use App\Model\Category;
use App\Model\Photo;

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

    public function getAllPhotos(){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "photo";

        $photo = new Photo();
        $allphoto = $photo->getAllPhotos();
        $allphoto = array_reverse($allphoto);
        return $this->render("admin/photos.php",[
            "allphoto" => $allphoto
        ]);
    }

    public function uploadPhoto_fetch(){
        $photo = new Photo();
        $tab = $photo->addOnePhoto($_FILES['photo']);
        return $this->render("admin/onephoto.php",[
            "photo" => $tab
        ]);
    }

    public function uploadPhoto_jquery(){
        $photo = new Photo();
        $tab = $photo->addOnePhoto($_FILES['photo']);
        return $this->render("admin/onephoto.php",[
            "photo" => $tab
        ]);
    }

    public function uploadPhoto_classic(){echo "<pre>";var_dump($_FILES);echo "</pre>";
        $total = count($_FILES["photos_file"]["name"]);
        if($total > 0)$photo = new Photo();
        for($i = 0;$i < $total;$i++){
            $photo->addOneClassicPhoto($_FILES['photos_file'], $i, $_POST["photo_name"]);
        }
        $this->Toredirect("admin/photos");
    }

    public function deletePhoto($id){
        $response = [
            "status" => 1,
            "message" => ""
        ];

        $photo = new Photo();
        $photo->deleteOnePhoto($id);
        $this->json($response);
    }
}