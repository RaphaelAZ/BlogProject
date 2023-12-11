<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Projet</title>
  <link rel="stylesheet" href="./assets/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <header class="text-center">
    <nav class="5 navbar navbar-expand-lg navbar-light bg-success">
        <a href="/" class="navbar-brand mx-5 link-light">Accueil</a>
        <a href="/articles" class="navbar-brand link-light">Voir les Articles</a>
        <?php
        if(isset($_SESSION['name'])){
          echo ("<div class='mr-auto mx-4 collapse navbar-collapse justify-content-end text-light'>".$_SESSION['name']."</div>");
        } else {
          echo ("
          <div class='mr-auto collapse navbar-collapse justify-content-end'>
          <a href='/login' class='navbar-brand mx-5 justify-content-end link-light'>Se connecter</a>
          </div>");
        }
        ?>
        
    </nav>
    <div class="mt-3">
        <?php
            if(isset($_SESSION['name'])){
                ?> <a href="/deconnexion" class="text-decoration-none rounded bg-danger p-1 link-light">Déconnexion</a> <?php
            }
        ?>
    </div>
  </header>