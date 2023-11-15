<?php

include './model/articlesModel.php';
include './model/bddModel.php';
$bddConnection = new BDDConnection();
$articlesList = $bddConnection->execute("SELECT * FROM articles");
$List = $articlesList->fetchAll();
$articles = new Articles($List);
include './view/articlesView.php';

?>