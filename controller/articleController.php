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
} catch(PDOException $e) {
    $error = $e;
}

if(isset($_POST['comment_delete'])){
    
}

include './view/headerView.php';
include './view/articleView.php';
include './view/footerView.php';

?>