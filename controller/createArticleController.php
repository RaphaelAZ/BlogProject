<?php

include './model/bddModel.php';
include './model/articlesManagerModel.php';

try {
    $database = new BDDConnection();
    $Amanager = new ArticlesManager($database);
} catch (PDOException $e) {
    return $e;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_SESSION['session_token'])) {
    if(isset($_POST['post-name'])&&isset($_POST['post-context'])&&isset($_POST['post-content'])){
        $Amanager->addNewArticle($_POST['post-name'],$_POST['post-context'],$_POST['post-content']);
        unset($_POST);
        header("Location : /articles");
    }
}

include './view/headerView.php';
include './view/createArticleView.php';
include './view/footerView.php';

?>