<?php
use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new App\Controller\HomeController(), "index"));
    $r->addRoute('POST', '/',array(new App\Controller\HomeController(), "index"));
    $r->addRoute('GET', '/deconnexion',array(new App\Controller\HomeController(), "logout"));
    $r->addRoute('GET', '/admin',array(new App\Controller\AdminController(), "index"));
    $r->addRoute('POST', '/admin/addcategory',array(new App\Controller\AdminController(), "addCategory"));
    $r->addRoute('GET', '/admin/getcategory/{id:\d+}',array(new App\Controller\AdminController(), "getCategory"));
    $r->addRoute('DELETE', '/admin/deletecategory/{id:\d+}',array(new App\Controller\AdminController(), "deleteCategory"));
    $r->addRoute('PUT', '/admin/modifycategory/{id:\d+}',array(new App\Controller\AdminController(), "modifyCategory"));
    $r->addRoute('GET', '/admin/photos',array(new App\Controller\AdminController(), "getAllPhotos"));
    $r->addRoute('POST', '/admin/fetchuploadphoto',array(new App\Controller\AdminController(), "uploadPhoto_fetch"));
    $r->addRoute('POST', '/admin/jqueryuploadphoto',array(new App\Controller\AdminController(), "uploadPhoto_jquery"));
    $r->addRoute('POST', '/admin/classicformuploadphotos',array(new App\Controller\AdminController(), "uploadPhoto_classic"));
    $r->addRoute('DELETE', '/admin/deletephoto/{id:\d+}',array(new App\Controller\AdminController(), "deletePhoto"));
    $r->addRoute('GET', '/admin/articles',array(new App\Controller\AdminController(), "getAllArticles"));
    $r->addRoute('GET', '/admin/editer_un_article',array(new App\Controller\AdminController(), "editArticle"));
    $r->addRoute('POST', '/admin/editer_un_article',array(new App\Controller\AdminController(), "editArticle"));
    $r->addRoute('GET', '/admin/editer_un_article/{id:\d+}',array(new App\Controller\AdminController(), "editArticle"));
    $r->addRoute('POST', '/admin/editer_un_article/{id:\d+}',array(new App\Controller\AdminController(), "editArticle"));
    $r->addRoute('GET', '/api/getallcategory',array(new App\Controller\ApiController(), "getAllCategory"));
};