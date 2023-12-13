<?php

include './model/articleModel.php';
include './model/commentModel.php';
include './model/articlesManagerModel.php';
include './model/commentsManagerModel.php';
include './model/bddModel.php';

$error = "";

try{
    $database = new BDDConnection();
    $Amanager = new ArticlesManager($database);
    $Cmanager = new CommentsManager($database);
    $article = $Amanager->getArticleById($_GET['id']);
    $comments = $Cmanager->getCommentsOfArticle($_GET['id']);
    $contenu_url = "http://localhost:8000/article?id=".$_GET['id'];

    $facebook_share_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($contenu_url);
} catch(PDOException $e) {
    $error = $e;
}

include './view/headerView.php';
include './view/articleView.php';
include './view/footerView.php';

?>