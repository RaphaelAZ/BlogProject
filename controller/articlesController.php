<?php

include './model/articleModel.php';
include './model/articlesManagerModel.php';
include './model/bddModel.php';

$error = "";

try{
    $database = new BDDConnection();
    $manager = new ArticlesManager($database);
    $articlesList = $manager->getAllArticles();
} catch(PDOException $e) {
    $error = $e;
}

include './view/headerView.php';
include './view/articlesView.php';
include './view/footerView.php';

?>