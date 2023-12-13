<?php

include './model/bddModel.php';
include './model/userConnectionManagerModel.php';
include './model/userConnectionModel.php';

$error = "";
$validConnection = "";

try{
    $database = new BDDConnection();
    $Umanager = new UserConnectionManager($database);
} catch(PDOException $e) {
    $error = $e;
}

if(isset($_POST['username'])&&isset($_POST['password'])){
    if($Umanager->verifyUser($_POST['username'],$_POST['password'])){
        $validConnection = "La connexion a été établie";
        $_SESSION['session_token'] = bin2hex(random_bytes(32));;
        $_SESSION['name'] = $Umanager->verifyUser($_POST['username'],$_POST['password'])->getName();
        $_SESSION['admin'] = $Umanager->verifyUser($_POST['username'],$_POST['password'])->isAdmin();
        $_SESSION['id'] = $Umanager->verifyUser($_POST['username'],$_POST['password'])->getID();
    }
    else {
        $error = "Utilisateur Inexistant";
    }
}

include './view/headerView.php';
include './view/loginView.php';
include './view/footerView.php';

?>