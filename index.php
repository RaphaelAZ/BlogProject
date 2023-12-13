<?php 
session_start();

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
else {
  $id=0;
}

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case "/article?id=".$id :
        include "./controller/articleController.php";
        break;
    case "/articles":
        include "./controller/articlesController.php";
        break;
    case "/login":
        include "./controller/loginController.php";
        break;
    case "/deconnexion":
        include "./controller/deconnexionController.php";
        break;
    default: 
        include "./controller/homeController.php";
        break;
};
?>