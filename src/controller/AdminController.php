<?php

namespace App\Controller;

use Config\AbstractController;
use Config\FlashBag;
use App\Model\Category;
use App\Model\Photo;
use App\Model\Article;
use App\Service\ToolService;

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
        
        $response["message"] = $category->deleteCategory($id);
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

    public function uploadPhoto_classic(){
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

    public function getAllArticles(){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "article";

        $article = new Article();
        $allarticle = $article->getAllArticles();
        $allarticle = array_reverse($allarticle);
        $category = new Category();
        foreach($allarticle as $key=>$value){
            $allarticle[$key]["category"] = "";
            $tab = $category->getCategoryById($value["category_id"]);
            if(isset($tab[0]))$allarticle[$key]["category"] = $tab[0]["name"];
        }
        return $this->render("admin/articles.php",[
            "allarticle" => $allarticle
        ]);
    }


    public function editArticle($id=null){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "onearticle";
        $flash = new FlashBag();
        $flash->empty();

        $article = new Article();
        $table = $article->getTable();
        //get
        if($id != null){
            $results = $article->getArticleById($id);
            if(count($results) > 0)$table = $results[0];
        }
        //post
        if(isset($_POST["article_id"])){
            $table["title"] = (isset($_POST["article_title"]))?$_POST["article_title"]:"";
            $table["category_id"] = (isset($_POST["article_category_id"]))?$_POST["article_category_id"]:"";
            $table["text"] = (isset($_POST["article_text"]))?html_entity_decode($_POST["article_text"]):"";
            if($table["text"] != ""){
                if($_POST["article_id"] == ""){
                    $article->addOneArticle($table);
                    $this->Toredirect("admin/articles");
                }else{
                    $article->updateOneArticle($table);
                    $flash->set("Enregistré","success");
                }
            }else{
                $flash->set("Veuillez remplir tous les champs","danger");
            }
        }
        
        $category = new Category();
        $allcategory = $category->findAll()->fetchAll();
        $ts = new ToolService();
        $allcategory = $ts->sortTDArray($allcategory, "name", 1);

        $photo = new Photo();
        $allphoto = $photo->getAllPhotos();
        return $this->render("admin/onearticle.php",[
            "id" => $id,
            "table" => $table,
            "allcategory" => $allcategory,
            "flash" => $flash->get(),
            "allphoto"=> $allphoto
        ]);
    }

    public function deleteArticle($id){
        $response = [
            "status" => 1,
            "message" => ""
        ];

        $article = new Article();
        $response["message"] = $article->deleteOneArticleById($id);
        $this->json($response);
    }

    public function getAllUsers(){
        return $this->render("admin/users.php",[
            
        ]);
    }
}