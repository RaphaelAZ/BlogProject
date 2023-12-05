<?php

include './model/articleModel.php';
include './model/bddModel.php';
$bddConnection = new BDDConnection();
if(isset($_GET['id'])){
    $article = $bddConnection->execute("SELECT * FROM articles WHERE id=".$_GET['id']);
    $theArticle = $article->fetchAll();

    $comments = $bddConnection->execute("SELECT * FROM comments WHERE idArticles=".$_GET['id']." ORDER BY postDate DESC");
    $commentaries = $comments->fetchAll();

    $users = $bddConnection->execute("SELECT name,email,admin FROM users");
    $usersList = $users->fetchAll();
    $listOfUsers = array();
    foreach($usersList as $user){
        var_dump($user);
    }
} else {
    $error = "Aucun article à afficher";
}
include './view/articleView.php';

?>