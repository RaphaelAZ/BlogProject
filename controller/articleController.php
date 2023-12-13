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


    $contenu_url = "http://localhost:8000/article?id=1";

    $facebook_share_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($contenu_url);
    $x_share_url = "https://twitter.com/intent/tweet?url=".urlencode($contenu_url);
} catch(PDOException $e) {
    $error = $e;
}

if(isset($_POST['comment'])&&isset($_SESSION['session_token'])){
    $postDate = date('Y-m-d h:i:s', time());
    $NewComment = new Comment("",intval($_GET['id']),intval($_SESSION['id']),$postDate,$_POST['comment']);
    $Cmanager->insertNewComment($NewComment);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_POST);
    if(isset($_POST['comment'])&&isset($_SESSION['session_token'])){
        $postDate = date('Y-m-d h:i:s', time());
        $NewComment = new Comment("",intval($_GET['id']),intval($_SESSION['id']),$postDate,$_POST['comment']);
        $Cmanager->insertNewComment($NewComment);
    }

    $id = $_GET['id'];

    header("Location: /article?id=$id");
}

include './view/headerView.php';
include './view/articleView.php';
include './view/footerView.php';

?>