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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    if(isset($_POST['comment'])&&isset($_SESSION['session_token'])){
        $postDate = date('Y-m-d h:i:s');
        $NewComment = new Comment("",intval($_GET['id']),intval($_SESSION['id']),$postDate,$_POST['comment']);
        $Cmanager->insertNewComment($NewComment);
        header("Location: /article?id=$id");
    }

    if(isset($_POST['modify-post'])){
        $Amanager->modifyPostByID($_POST['modify-post'],$_GET['id']);
        header("Location: /article?id=$id");
    }

    if(isset($_POST['delete_comment'])){
        $Cmanager->deleteACommentById($_POST['delete_comment']);
        header("Location: /article?id=$id");
    }

    if(isset($_POST['delete-post'])){
        $Cmanager->deleteAllCommentsByID($_GET['id']);
        $Amanager->deleteThisPost($_GET['id']);
        header("Location : localhost:8000/articles");
    }
    unset($_POST);
}

include './view/headerView.php';
include './view/articleView.php';
include './view/footerView.php';

?>