<?php

include './model/articleModel.php';
include './model/bddModel.php';
$bddConnection = new BDDConnection();
if(isset($_GET['id'])){
    $article = $bddConnection->execute("SELECT * FROM articles WHERE id=".$_GET['id']);
    $theArticle = $article->fetchAll();

    $comments = $bddConnection->execute("SELECT * FROM comments WHERE idArticles=".$_GET['id']." ORDER BY postDate DESC");
    $commentaries = $comments->fetchAll();

    var_dump($commentaries);

} else {
    $error = "Aucun article à afficher";
}
include './view/articleView.php';

?>