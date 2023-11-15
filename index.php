<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche d'adresses</title>
  <link rel="stylesheet" href="./assets/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <header class="text-center">
    <nav class="5 navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/" class="navbar-brand mx-5 link-primary">Accueil</a>
        <a href="/articles" class="navbar-brand link-primary">Voir les Articles</a>
    </nav>
  </header>
  <main class="container mt-5">
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            echo "<a href='/articles' class='text-decoration-none rounded bg-danger p-1 link-light'>Retour</a>";
        }
        else {
            $id=0;
        }
    ?>
    <h2 class="h3 mt-3">My Blog</h2>
    <?php
      $request = $_SERVER['REQUEST_URI'];

      if($request!=="/") {
        switch ($request) {
            case "/article":
                include "./controller/articleController.php";
                break;
            case "/article?id=".$id :
                include "./controller/articleController.php";
                break;
            case "/articles":
                include "./controller/articlesController.php";
                break;
            case "/":
                echo"111";
                break;
            default: 
                echo"222";
                break;
        };
      } ?>
  </main>
</body>
</html>