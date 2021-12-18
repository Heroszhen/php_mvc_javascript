<?php

namespace App\Controller;

use Config\AbstractController;
use Config\FlashBag;
use App\Model\User;

class HomeController extends AbstractController{

    public function index(){

        if(isset($_SESSION["user"]))$this->Toredirect("admin");

        $_SESSION["page"] = "home";
        $flash = new FlashBag();
        $flash->empty();
        $user = new User();
        $userTable = $user->getTable();

        $post = $_POST;
        if($post != null){
            $email = (isset($post["login_email"]))?$post["login_email"]:"";
            $password = (isset($post["login_password"]))?$post["login_password"]:"";
            if($email != "" && $password != ""){
                $result = $user->findUserByEmail($email);
                $result = $result->fetchAll();
                if(count($result) > 0){
                    $found = $result[0];
                    if (password_verify($password, $found["password"])){
                        $found["password"] = "";
                        $_SESSION["user"] = $found;
                        //redirection
                        $_SESSION["page"] = "admin_category";
                        $this->Toredirect("admin");
                    }
                }
                $flash->set("L'email ou le mot de passe incorrect","danger");
            }else{
                $flash->set("Veuillez remplir tous les champs","danger");
            }
            $userTable["email"] = $email;
        }
        
        $this->render("home/index.php",[
            "userTable" => $userTable,
            "flash" => $flash->get()
        ]);
    }


    public function logout(){
        unset($_SESSION["user"]);
        $this->Toredirect("");
    }
    
}